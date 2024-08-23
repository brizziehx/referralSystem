<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Models\Purchase;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $referralCount = Referral::where('referrer_id', Auth::user()->id)->orWhere('referred_id')->count();
        $purchases = Purchase::where('referred_id', Auth::user()->id)->sum('amount');
        $earnings = Earning::where('user_id', Auth::user()->id)->sum('amount_earned');

        return view('dashboard.index', ['referral' => $referralCount, 'purchases' => $purchases, 'earnings' => $earnings]);
    }
}