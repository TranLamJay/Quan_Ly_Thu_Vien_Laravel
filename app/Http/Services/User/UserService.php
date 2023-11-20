<?php

namespace App\Http\Services\User;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class UserService{

    public function get(){
        return Role::select('*')->get();
    }

    public function create($request){ 
        //try{
            User::create([
                "name"=>(string) $request->input('name'),
                "email"=>(string) $request->input('email'),
                'password'=>(string) $request->input('password'),
                "image"=>(string) $request->input('image'),
                "date_birth"=>(string) $request->input('date_birth'),
                "sex"=>(string) $request->input('sex'),
                "address"=>(string) $request->input('address'),
                "CCCD"=>(string) $request->input('CCCD'),
                "active"=>(string) $request->input('active'),
            ]);
            //request()->Session->flash('success','Tạo tài khoản thành công');

        //}catch(\Exception $err){
            //request()->Session->flash('error', $err->getMessage());
            //return false;
        //}
        //return true;
    }
}