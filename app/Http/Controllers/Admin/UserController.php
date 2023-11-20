<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\User\UserService;


class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function create(){
        return view("Admin.Users.add",["title"=> "Thêm người dùng",
        'role_id'=> $this->userService->get()
    ]);
    }

    public function store(CreateFormRequest $request){
        $this->userService->create($request);
        dd($request->all());
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Users.list_librarian",["title"=> "Danh sách Thủ thư"]);
    }

    public function index_2(){
        return view("Admin.Users.list_readers",["title"=> "Danh sách Độc giả"]);
    }
}
