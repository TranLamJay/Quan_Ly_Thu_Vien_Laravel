<?php

namespace App\Http\Services\Author;

use Illuminate\Support\Facades\Session;
use App\Models\Author;

class AuthorService{

    public function create($request){ 
        Author::create([
            'id'=>(int) $request->input('id'),
            'name'=>(string) $request->input('name'),
        ]);
    }

    public function get(){
        return Author::orderByDesc('id')->paginate(10);
    }

    public function update ($author, $request){
        try{
            $author->fill($request->input());
            $author->save();
            Session::flash('success', 'Cập nhật thành công');
        }
        catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $author = Author::where('id', $request->input('id'))->first();
        if($author){
            $author->delete();
            return true;
        }
        return false;
    }
}