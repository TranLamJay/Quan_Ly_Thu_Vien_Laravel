<?php

namespace App\Http\Services\Author;

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

    public function delete($request){
        $author = Author::where('id', $request->input('id'))->first();
        if($author){
            $author->delete();
            return true;
        }
        return false;
    }
}