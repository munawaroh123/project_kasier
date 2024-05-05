<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\AuthRequest;
use App\Http\Requests\AuthRequest as RequestsAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{ 
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->role) {
                case 'kasir':
                    return redirect()->intended('/');
                    break;

                case 'admin':
                    return redirect()->intended('/');
                    break;

                case 'owner':
                    return redirect()->intended('/');
                    break;
            }
        }
        return view('auth.index');
    }

    public function cekUserLogin(RequestsAuthRequest $request)
    {
        $credential = $request->only('email', 'password');
        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user->role) {
                case 'kasir':
                    return redirect()->intended('/');
                    break;

                case 'admin':
                    return redirect()->intended('/');
                    break;

                case 'owner':
                    return redirect()->intended('/');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'notfound' => 'Email or password is wrong '
        ])->onlyInput('email');
    }

    public function logout ( Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/login');
    }
}
