<?php

namespace App\Http\Services\Book;

use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Language;
use App\Models\Producer;
use Illuminate\Support\Facades\Session;

class BookService{
    public function getCategory(){
        return Category::select('*')->get();
    }
    public function getProducer(){
        return Producer::select('*')->get();
    }
    public function getLanguage(){
        return Language::select('*')->get();
    }
    public function getAuthor(){
        return Author::select('*')->get();
    }
    

    public function insert($request){
        try{
            $request->except('_token');
            Book::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');

        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;

        }
        return true;   
        
    }

    public function get(){
        return Book::with('category','producer','language')->orderByDesc('id')->paginate(15);
    }
}
