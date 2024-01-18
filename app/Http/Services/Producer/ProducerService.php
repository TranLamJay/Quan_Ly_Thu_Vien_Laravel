<?php

namespace App\Http\Services\Producer;

use App\Models\Producer;
use Illuminate\Support\Facades\Session;

class ProducerService{
    public function create($request){ 
        //dd($request);
        try{
            Producer::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;    
    }

    public function getAll(){
        return Producer::orderbyDesc('id')->paginate(10);
    }

    public function update ($producer, $request){
        try{
            $producer->fill($request->input());
            $producer->save();
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

        $producer=Producer::where ('id',$id)->first();
        if($producer){
            return Producer::where('id',$id)->delete();
        }
        return false;
    }

}