<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Mail;
use App\Mail\verifyUserByEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$connected = fopen("http://www.google.com:80/","r");
        //if(!$connected)
        //{
            //return redirect('/auth/register')->with('error', 'Internet is not connected.');
        //}else{
            $user = User::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type' => $data['user_type'],
                'verifyToken' => str_random(25),
            ]);
           // Mail::to($user->email)->send(new verifyUserByEmail($user)); //SENDS VER MAIL
            return $user;
        //}
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);
        Auth::logout();

        return redirect('login')->with('message', 'Check your Email to verify your account.');
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function verifyUser($email, $token){
        $user = User::where(['email' => $email, 'verifyToken' => $token])->first();
        if($user){
            $user->verifyToken = '';
            $user->status = 1;
            if($user->save()){
                return redirect('/login')->with('message', 'Your account has been verified successfully.');
            } else {
                return redirect('/login')->with('message', 'Invalid email or token.');
            }
        } else {
            return redirect('/login')->with('message', 'Invalid email or token.');
        }
    }
}