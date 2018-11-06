<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Token;
use App\Http\Traits\LogInwToken;
//Login
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
//Register
//use Illuminate\Foundation\Auth\RegistersUsers;
/*use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;*/
//use Illuminate\Auth\Events\Registered;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OauthController extends Controller
{
    use AuthenticatesUsers, LogInwToken;
    //use RegistersUsers;

    public function index()
    {
        return view('login');
    }

    public function oldlogin(Request $request)  // NOT in use
    {
        $username = $request['username'];
        $password = $request['password'];

        if($username == 'robert001' || $username == 'patin001') {
            if($password == 'prueba01'){
                $url = 'https://oauth-club.aper.net/callback?code=';
                return Redirect::to($url.Str::uuid());
            }
            return view('login', ['error' => 'password']);
        }
        return view('login', ['error' => 'username']);
    }

    public function login(Request $request)
    {
        return $this->tokenLogin($request);
    }

    public function token()
    {
        $data = [
            "access_token" => Str::uuid(),
            "token_type" => "Bearer",
            "expires_in" => 3600,
            "refresh_token" => Str::uuid(),
            "scope" => "read"
        ];

        return response()->json($data);
    }
/*
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: $this->redirect($this->redirectPath());
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
*/
    // imported functions
    protected function Credentials(Request $request)
    {
        return [
            "email" => $request->input('username'),
            "password" => $request->input('password')
        ];
    }/*
    protected function guard()
    {
        return Auth::guard();
    }
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }*/
}
