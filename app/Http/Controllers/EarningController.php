<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Earning;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEarningRequest;
use App\Http\Requests\UpdateEarningRequest;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUserId = Auth::user()->id;

        $purchases = Earning::where('user_id', $authUserId)->paginate(9);
        // dd($purchases);
        return view('dashboard.earning.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEarningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Earning $earning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Earning $earning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEarningRequest $request, Earning $earning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Earning $earning)
    {
        //
    }
}
