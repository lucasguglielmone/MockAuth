<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use App\Token;
use Illuminate\Support\Facades\DB;

trait LogInwToken
{
    use AuthenticatesUsers;

    public function tokenLogin($request)
    {
        if($this->guard()->attempt($this->Credentials($request), $request->filled('remember')))
        {
            $request->session()->regenerate();

            $user = DB::table('users')->select('id')->where('email', $request->username)->get();

            Token::create([
                'uid' => $user[0]->id,
                'token' => $request['_token']
            ]);

            $this->clearLoginAttempts($request);

            return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->intended($this->redirectPath().'/code='.$request['_token']);
        }
        return view('login', ['error' => 'gen']);
    }
    protected function Credentials(Request $request)
    {
        return [
            "email" => $request->input('username'),
            "password" => $request->input('password')
        ];
    }
}
