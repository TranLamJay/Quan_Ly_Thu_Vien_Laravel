<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view("User/Orders/index",[
            "title"=> "Phiếu mượn sách",
        ]);
    }

    // public function cart($id){
    //     $book = Book::FindOrFail($id);
    //     $cart = session()->get('cart, []');
    //     if(isset($cart[$id])){
    //         $cart[$id]['quantity']++;
    //     }else{
    //         $cart[$id]=[
    //             "name"=>$book->name,
    //             "quantity"=>1,
    //             "image"=>$book->image,
    //         ];
    //     }
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success', 'Thêm sách vào giỏ thành công.');
    // }
}
