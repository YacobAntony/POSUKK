<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
         return view('admin.auth.login');
    }

     public function doLogin(Request $request)
     {
        $data = $request->validate([
            'email' => 'required|email',
            'password' =>'required',
        ]);

        if(Auth::attempt($data)){
          Alert::success('success', 'Selamat datang');
             $request->session()->regenerate();
            return redirect ('/admin/dashboard');
      }
      return back()->with('loginError', 'Salah cokkkkkkkk');
           
     }

     function logout()
     {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');

     } 

}
