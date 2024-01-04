<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\User\UserService;
use App\Models\User;

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
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Users.list",
        ["title"=> "Danh sách Độc giả",'users'=>$this->userService->getUsers(),]);
        
    }

    public function show(User $user){
        return view("Admin.Users.edit",["title"=> "Chỉnh sửa User" . $user->id,
        'users'=> $user,
        'role_id'=> $this->userService->get(),]);
    }

    public function update(Request $request, User $user)
    {
        $this->userService->update($request, $user);
        return redirect('/admin/users/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->userService->delete($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công'
            ]);
        }

        return response()->json(['error'=>true]);
    }
}
