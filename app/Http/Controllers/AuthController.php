<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $referralCode = $request->query('ref');

        return view('auth.register', ['referralCode' => $referralCode]);
    }

    public function store(Request $request) {
        $referralCode = $request->query('ref');
        $fields = $request->validate([
            'fullname' => ['required', 'max:50'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:3', 'confirmed'],
            'password_confirmation' => ['required'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code',]
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password
        ]);

 
        if ($request->referral_code) {
            $referrer = User::where('referral_code', $request->referral_code)->first();
            // dd($referrer);
            Referral::create([
                'referrer_id' => $referrer->id,
                'referred_id' => $user->id,
                'referral_code' => $request->referral_code,
            ]);
        }

        return back()->with('success', 'Your accoun\'t was created successfully');
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => ['required', 'max:255'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($fields)) {
            return redirect()->intended('/dashboard');
        } else {
            return back()->withErrors(['message' => 'Email or Password is incorrect']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    protected function rewardReferrer(User $referrer, User $referee)
    {
        $referrer->referral->increment('earnings', 10);
    }
}
