<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function Admin_Registrar(Request $request) {
    // dd($request->all());
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    // $user->password = md5($request->password);
    // dd('Usuario', $user);
    $user->save();

    Auth::login($user);    
    return redirect(route('admin.inicio'));
  }

  public function Admin_LogIn(Request $request) {
    //Validar
    $credenciales = [
        'email' => $request->email,
        'password' => $request->password        
    ];

    if (Auth::attempt($credenciales)) {
        $request->session()->regenerate();
        return redirect(route('admin.inicio'));
    } else {
        return redirect(route('login'));
    }
  }

  public function Admin_LogOut(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect(route('login'));
  }
}
