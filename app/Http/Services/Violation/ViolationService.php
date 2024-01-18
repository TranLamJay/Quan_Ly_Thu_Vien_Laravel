<?php

namespace App\Http\Services\Violation;

use App\Models\User;
use App\Models\Violation;
use Illuminate\Support\Facades\Session;

class ViolationService{

    public function get(){
        return User::where('role_id','3')->get();
    }

    public function create($request){ 
        try{
            Violation::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;    
    }

    public function getAll(){
        return Violation::orderbyDesc('id')->paginate(10);
    }

    public function update ($violation, $request){
        try{
            $violation->fill($request->input());
            $violation->save();
            Session::flash('success', 'Cập nhật thành công');
        }
        catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id= (int) $request->input('id');

        $violation=Violation::where ('id',$id)->first();
        if($violation){
            return Violation::where('id',$id)->delete();
        }
        return false;
    }

}