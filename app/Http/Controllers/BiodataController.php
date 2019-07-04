<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
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
        return view('/client/biodata');
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

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/client_images', $fileNameToStore);
        }

        $bio = new Biodata;
        $bio->user_id_fk = auth()->user()->id;
        $bio->client_photo = $fileNameToStore;
        $bio->client_address = $request->hmadrs;
        $bio->client_day = $request->birth_day;
        $bio->client_month = $request->birth_month;
        $bio->client_year = $request->birth_year;
        $bio->client_ph = $request->phnum;
        $saved = $bio->save();
        if($saved){
            return redirect('/client/profile');
        }
        else{
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bd = Biodata::find($id);
        return view('/client/edit', compact("bd"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image')->storeAs('public/client_images', $fileNameToStore);
        }

        $data = Biodata::find($request->id);
        $data->user_id_fk = auth()->user()->id;
        if($request->hasFile('image'))
        {
            $data->client_photo = $fileNameToStore;
        }
        $data->client_address = $request->hmadrs;
        $data->client_day = $request->birth_day;
        $data->client_month = $request->birth_month;
        $data->client_year = $request->birth_year;
        $data->client_ph = $request->phnum;
        $updated = $data->save();

        if($updated){
            return redirect('/client/profile')->with('success', 'Profile updated successfully.');
        }else{
            return redirect('/client/profile')->with('error', 'Profile can not be updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        //
    }
}
