<?php

namespace App\Http\Services\User;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function get(){
        return Role::select('*')->get();
    }

    public function create($request){ 
        $request->merge(['password'=>Hash::make($request->password)]);
        try{
            if($request->has('file_upload')){
                $file=$request->file_upload;
                $file_extent=$request->file_upload->getClientOriginalExtension();
                $file_name= time() .'_user.'.$file_extent;
                $file->move(public_path('uploads/users'),$file_name);
            }
            $request->merge(['image'=>$file_name]);
            $request->except('_token');

            User::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');

        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getUsers(){
        return User::with('role') ->orderByDesc('id')->search()->paginate(10);
    }

    public function update($request, $user){
        $request->merge(['password'=>Hash::make($request->password)]);
        try{
            if($request->has('file_upload')){
                $file=$request->file_upload;
                $file_extent=$request->file_upload->getClientOriginalExtension();
                $file_name= time() .'_user.'.$file_extent;
                $file->move(public_path('uploads/users'),$file_name);
            }
            $request->merge(['image'=>$file_name]);
            $request->except('_token');
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật thành công');

        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $user = User::where('id', $request->input('id'))->first();
        if($user){
            $user->delete();
            return true;
        }
        return false;
    }

}