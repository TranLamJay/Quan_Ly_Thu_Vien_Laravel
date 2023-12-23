<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.Login',[
            'title' => 'Login'
        ]);
    }

    public function register()
    {
        return view('Admin.register',[
            'title' => 'Register'
        ]);
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
        ], $request->input('remember'))) 

        {
            return redirect()->route('admin');
        }
            
        

            FacadesSession::flash('error','Email hoặc password không đúng!');
            return redirect()->back();
        
    }
        
}
