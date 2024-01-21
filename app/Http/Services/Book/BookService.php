<?php

namespace App\Http\Services\Book;

use App\Models\Author;
use App\Models\Category;
use Carbon\Carbon;
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
            if($request->has('file_upload')){
                $file=$request->file_upload;
                $file_extent=$request->file_upload->getClientOriginalExtension();
                $file_name= time() .'_book.'.$file_extent;
                $file->move(public_path('uploads'),$file_name);
            }
            $request->merge(['image'=>$file_name]);
            $request->merge(['date_add'=>Carbon::now()]);
            $request->except('_token');
            Author::create([
                'name'=>(string) $request->input('author')
            ]);
            Book::create($request->all());
            Session::flash('success', 'Dữ liệu đã được lưu thành công');

        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;

        }
        return true;   
        
    }

    public function get(){
        return Book::with('category','producer','language')->orderByDesc('id')->search()->paginate(10);
    }

    public function update ($request, $book){
        try{
            if($request->has('file_upload')){
                $file=$request->file_upload;
                $file_extent=$request->file_upload->getClientOriginalExtension();
                $file_name= time() .'_book.'.$file_extent;
                $file->move(public_path('uploads'),$file_name);
            }
            $request->merge(['image'=>$file_name]);
            $request->merge(['date_add'=>Carbon::now()]);
            $request->except('_token');
            // Author::create([
            //     'name'=>(string) $request->input('author')
            // ]);
            $book->fill($request->input());
            $book->save();
            Session::flash('success', 'Cập nhật thành công');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
        
    }

    public function delete($request){
        $book = Book::where('id', $request->input('id'))->first();
        if($book){
            $book->delete();
            return true;
        }
        return false;
    }
}
