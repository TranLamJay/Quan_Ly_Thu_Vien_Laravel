<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.Login',['title' => 'Login']);
    }

    public function register()
    {
        return view('Admin.register',[
            'title' => 'Register'
        ]);
    }

    public function create(Request $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        try{
            User::create($request->all());
            Session::flash('success', 'Tạo tài khoản thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return redirect()->route('login');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'email'=> 'required',
            'password'=> 'required',
        ]);

        if(Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password'),
            'role_id'=>1,
        ], $request->input('remember')))

        {
            return redirect()->route('admin');
        }
        elseif (Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password'),
            'role_id'=>2,
        ], $request->input('remember'))) 

        {
            return redirect()->route('admin');
        }
        elseif (Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password'),
            'role_id'=>3,
        ], $request->input('remember'))) 

        {
            return redirect()->route('user');
        }
            
            FacadesSession::flash('error','Email hoặc password không đúng!');
            return redirect()->back();
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
        
}
