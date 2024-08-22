<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Referral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function recordPurchase(Request $request)
    {
        $request->validate([
            'referred_id' => ['required','exists:users,id'],
            'amount' => ['required','numeric','min:0'],
        ]);

        $purchase = Purchase::create([
            'referred_id' => $request->referred_id,
            'amount' => $request->amount,
        ]);

        return response()->json(['purchase' => $purchase], 201);
    }

    public function getEarnings($referrerId)
    {
        $referrals = Referral::where('referrer_id', $referrerId)->with('referred.purchases')->get();

        $earnings = 0;

        foreach ($referrals as $referral) {
            foreach ($referral->referred->purchases as $purchase) {
                $earnings += $purchase->amount * 0.1;
            }
        }

        return response()->json(['earnings' => $earnings], 200);
    }
}
