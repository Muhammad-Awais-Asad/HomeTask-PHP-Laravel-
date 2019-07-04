<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class CommitmentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function commitment(){
    	
    	return view('user/commitment');
    }
}
