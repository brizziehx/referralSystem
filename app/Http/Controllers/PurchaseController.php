<?php

namespace App\Http\Controllers;
use App\Models\Earning;
use App\Models\Purchase;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::where('referred_id', Auth::user()->id)->get();
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

        $referrals = DB::table('referrals')
        ->join('users', 'referrals.referrer_id', '=', 'users.id')
        ->select('referrals.*', 'users.*')
        ->get();

        if($referrals->isNotEmpty()) {
            Earning::create([
                'user_id' => $referrals[0]->referrer_id, 
                'purchase_id' => $purchase->id,
                'amount_earned' => $referrerEarnings,
                'purchaser_id' => Auth::user()->id
            ]);
        }
        

        return back()->with('success', 'Product record has been added successfully');
    }

    // public function getEarnings($referrerId)
    // {
    //     $referrals = Referral::where('referrer_id', $referrerId)->with('referred.purchases')->get();

    //     $earnings = 0;

    //     foreach ($referrals as $referral) {
    //         foreach ($referral->referred->purchases as $purchase) {
    //             $earnings += $purchase->amount * 0.1;
    //         }
    //     }

    //     return response()->json(['earnings' => $earnings], 200);
    // }
}
