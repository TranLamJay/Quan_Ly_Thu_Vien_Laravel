<?php

namespace App\Http\Services\CallCard;

use App\Models\Book;
use App\Models\CallCard;
use App\Models\DetailCallCard;
use App\Models\User;

class CallCardService{

    public function getUser(){
        return User::select('*')->get();
    }

    public function getDetailCallCard(){
        return DetailCallCard::select('*')->get();
    }

    public function getBook(){
        return Book::select('*')->get();
    }

    public function get(){
        return CallCard::orderByDesc('id')->paginate(10);
    }
}
//with('users','details_call_card', 'book')->