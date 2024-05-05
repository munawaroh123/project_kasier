<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

class UserController extends Controller
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

    public function user()
    {
        try {
            $data['user'] = DB::table('users')
            ->orderBy('created_at', 'DESC')
            ->get();
          return view('User.index')->with($data);
        } catch (QueryException | Exception | PDOException $error){
            $this->failResponse($error->getCode());
        }

    }

    public function store(UserRequest $request)

    {
        // try {
            // DB::beginTransaction();
            User::create($request->all());
            // DB::commit();
            return redirect('user')->with('success', 'User berhasil ditambahkan!');
        // } catch (QueryException | Exception | PDOException $error){
            // DB::rollBack();
            // $this->failResponse($error->getMessage(), $error->getCode());
        // }
    }


    public function cekUserLogin(Request $request)
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


    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
             return redirect('user')->with('sussess', 'User berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
}
