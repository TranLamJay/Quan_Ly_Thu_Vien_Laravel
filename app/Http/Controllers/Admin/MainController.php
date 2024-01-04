<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\CallCard;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $book_total = Book::all()->count();
        $user_reader = User::where('role_id',3)->count();
        $borrowing = CallCard::where('status',0)->count();
        $overdue = CallCard::where('return_date', '<',now())->count();
        return view('Admin.home',
        ['title'=>'Trang Quản Trị Admin'], 
        compact('book_total', 'user_reader','borrowing','overdue'));
    }
}
