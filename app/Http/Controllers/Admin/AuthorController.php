<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Author\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorService;
    public function __construct(AuthorService $authorService){
        $this->authorService = $authorService;
    }
    public function create(){
        return view("Admin.Authors.add",["title"=> "Thêm Tác Giả"]);
    }

    public function store(Request $request){
        
        $result =$this->authorService->create($request);
        return redirect()->back();
    }

    public function index(){
        return view("Admin.Authors.list",["title"=> "Danh sách Tác Giả",
        'authors'=>$this->authorService->get(),
    ]);
    }

    public function show(Author $author){
        return view("Admin.Authors.edit",["title"=> "Chỉnh sửa Tác giả" . $author->id,
        'authors'=> $author
    ]);
    }

    public function update(Author $author, Request $request){
        $this-> authorService->update($author,$request);
        return redirect('/admin/author/list');
    }


    public function destroy(Request $request){
        $result = $this->authorService->delete($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công'
            ]);
        }

        return response()->json(['error'=>true]);
    }
}
