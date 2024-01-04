<?php

namespace App\Http\Services\Language;

use App\Models\Language;
use Illuminate\Support\Facades\Session;

class LanguageService{
    public function create($request){ 
        try{
            Language::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;    
    }

    public function getAll(){
        return Language::orderbyDesc('id')->paginate(10);
    }

    public function update ($language, $request){
        try{
            $language->fill($request->input());
            $language->save();
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

        $language=Language::where ('id',$id)->first();
        if($language){
            return Language::where('id',$id)->delete();
        }
        return false;
    }

}