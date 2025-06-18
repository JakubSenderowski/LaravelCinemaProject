<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function loginPost(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $dane = $request->only("email", "password");
        if(Auth::attempt($dane)){
            return redirect("/");
        }else {
            return redirect()->back()->with("Blad", "Nieprawidłowe dane logowania");
        }
    }
    public function register(){
        return view("auth.register");
    }
    public function registerPost(Request $request){
        $request->validate([
           'name' => ['required'],
           'email' => ['required', 'email'],
           'password' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()){
            return redirect(route("login"))->with("Sukces", "Konto założone pomyślnie");
        }
        return redirect(route("register"))->with("Blad", "Rejestracja zakończona niepowodzeniem - spróbuj ponownie");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

}
