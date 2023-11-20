<?php

namespace App\Http\Services\Menu;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class MenuService{

    public function create($request){ 
        try{
            Category::create([
                'id'=>(int) $request->input('id'),
                'name'=>(string) $request->input('name'),
            ]);
            Session::flash('success', 'Dữ liệu đã được lưu thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;    
    }

    public function getAll(){
        return Category::orderbyDesc('id')->paginate(10);
    }

    public function update ($category, $request){
        $category->fill($request->input());
        $category->save();
    }

    public function destroy($request){
        $id= (int) $request->input('id');

        $category=Category::where ('id',$id)->first();
        if($category){
            return Category::where('id',$id)->delete();
        }
        return false;
    }
}