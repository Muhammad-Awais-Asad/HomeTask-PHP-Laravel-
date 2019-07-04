<?php

namespace App\Http\Controllers;

use App\UserSkills;
use Illuminate\Http\Request;

class UserSkillsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $us = new UserSkills;
        $us->skill_id_fk = auth()->user()->id; 
        $us->skill_rate = $request->inp;
        $us->skill_supply = implode(",", $request->supply);
        $us->skill_pitch = $request->quickpitch;
        $us->skill_exp = $request->explvl;
        $saved = $us->save();
        if($saved){
            return redirect('/tasker/profile');
        }else{
            return redirect('/home');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserSkills  $userSkills
     * @return \Illuminate\Http\Response
     */
    public function show(UserSkills $userSkills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserSkills  $userSkills
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSkills $userSkills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserSkills  $userSkills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSkills $userSkills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserSkills  $userSkills
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSkills $userSkills)
    {
        //
    }
}
