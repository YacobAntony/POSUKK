<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AdminAuthController extends Controller
{
    public function index()
    {
         return view('admin.auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            're_password' => 'required|same:password',
        ]);

        // Periksa apakah ada role admin dalam database
        $adminRoleExists = User::where('role', 'admin')->exists();
        // Tentukan role untuk user baru
        $role = $adminRoleExists ? 'kasir' : 'admin';

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('success', 'Registration successful');

        return redirect('/login');
    }
     public function nampilnoregister()
     
     {
          return view('admin.auth.register');
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
      return back()->with('loginError', 'Password atau email salah!');
           
     }

     function logout()
     {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
 
        return redirect('login');

     } 

     

}
