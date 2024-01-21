<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function show(User $user){
        return view("User.Accounts.edit",["title"=> "Chỉnh sửa Tài khoản" . $user->id,
        'users'=> $user,
        'role_id'=> $this->userService->get(),]);
    }

    public function update(Request $request, User $user)
    {
        $this->userService->update($request, $user);
        return redirect('/books');
    }
}
