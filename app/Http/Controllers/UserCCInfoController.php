<?php

namespace App\Http\Controllers;

use App\UserCCInfo;
use Illuminate\Http\Request;

class UserCCInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/user/payment_method');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cc = new UserCCInfo;
        $cc->tasker_id_fk = auth()->user()->id;
        $cc->user_cc = $request->cnumber;
        $cc->user_exp_month = $request->month;
        $cc->user_exp_year = $request->year;
        $cc->user_sc = $request->scnumber;
        $cc->user_zc = $request->zc;
        $saved = $cc->save();
        if($saved){
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCCInfo  $userCCInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserCCInfo $userCCInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCCInfo  $userCCInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCCInfo $userCCInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCCInfo  $userCCInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCCInfo $userCCInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCCInfo  $userCCInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCCInfo $userCCInfo)
    {
        //
    }
}
