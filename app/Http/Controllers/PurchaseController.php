<?php

namespace App\Http\Controllers;
use LDAP\Result;
use App\Models\Earning;
use App\Models\Purchase;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::where('referred_id', Auth::user()->id)->paginate(4);
        // dd($purchases)
        return view('dashboard.purchases.index', ['purchases' => $purchases]);
    }

    public function create() {
        return view('dashboard.purchases.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'referred_id' => ['required'],
            'product_name' => ['required', 'min:3'],
            'amount' => ['required','numeric','min:0'],
        ]);

        $referrerEarnings = $request->amount * 0.1;
        $purchase = Purchase::create($fields);

        $refs = Auth::user()->referralsReceived()->with('referrer')->get();
        foreach($refs as $ref) {
            // print_r($ref->referrer_id);
            if($refs->isNotEmpty()) {
                Earning::create([
                    'user_id' => $ref->referrer_id, 
                    // 'user_id' => $referral->user, 
                    'purchase_id' => $purchase->id,
                    'amount_earned' => $referrerEarnings,
                    'purchaser_id' => Auth::id()
                ]);
            }
            DB::table('users')->where('id', Auth::user()->id)->update(['status' => 1]);
        }
        
        return back()->with('success', 'Product record has been added successfully');
    }
}
