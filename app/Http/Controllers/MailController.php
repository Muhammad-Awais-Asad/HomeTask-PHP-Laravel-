<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\verifyUserByEmail;

class MailController extends Controller
{
    public function send(){
    	/*Mail::send(['text' => 'mail'], ['name', 'Usama'], function($message){
    		$message->to('usamasaleem00@gmail.com', 'To Usama Saleem')->subject('Test Email');
    		$message->from('usamasaleem00@gmail.com', 'Usama Saleem');
    	});*/

    	Mail::send(new verifyUserByEmail());
    }
}
