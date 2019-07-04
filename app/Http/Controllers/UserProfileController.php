<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
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
        return view('/user/eligibilty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|required|max:1999',
            'street' => 'required|max:191',
            'tehseel' => 'required|max:191',
            'city' => 'required|max:191',
            'district' => 'required|max:191',
            'zipcode' => 'int|required',
            //'pnumber' => 'int|required',
            'birth_day' => 'int|required',
            'birth_month' => 'int|required',
            'birth_year' => 'int|required',
            'phonetype' => 'required',
        ]);

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $profile = new UserProfile;
        $profile->user_id_fk = auth()->user()->id;
        $profile->user_photo = $fileNameToStore;
        $profile->user_street = $request->street;
        $profile->user_tehseel = $request->tehseel;
        $profile->user_city = $request->city;
        $profile->user_district = $request->district;
        $profile->user_zipcode = $request->zipcode;
        $profile->user_phno = $request->pnumber;
        $profile->user_date = $request->birth_day;
        $profile->user_month = $request->birth_month;
        $profile->user_year = $request->birth_year;
        $profile->user_phonetp = $request->phonetype;
        $profile->user_vehicle = implode(",", $request->vehicle);
        $saved = $profile->save();

        if ($saved)
        {
            return redirect('/user/categories');
        }
        else
        {
            return redirect('/home');
        }
        //dd($request->vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = UserProfile::where('id', $id)->first();
        return view('/tasker.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $profile = UserProfile::find($id);
        $profile->user_id_fk = auth()->user()->id;
        $profile->user_photo = $fileNameToStore;
        $profile->user_street = $request->street;
        $profile->user_tehseel = $request->tehseel;
        $profile->user_city = $request->city;
        $profile->user_district = $request->district;
        $profile->user_zipcode = $request->zipcode;
        $profile->user_phno = $request->pnumber;
        $profile->user_date = $request->birth_day;
        $profile->user_month = $request->birth_month;
        $profile->user_year = $request->birth_year;
        $profile->user_phonetp = $request->phonetype;
        $profile->user_vehicle = implode(",", $request->vehicle);
        $saved = $profile->save();

        if ($saved)
        {
            return redirect('/user/categories');
        }
        else
        {
            return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
