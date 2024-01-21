<?php

namespace App\Http\Services\CallCard;

use App\Models\Book;
use App\Models\CallCard;
use App\Models\DetailCallCard;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
        return CallCard::orderByDesc('id')->search()->paginate(10);
//with('users','details_call_card', 'book')->
    }

    // public function update($request, $callCard){
    //     try{
            
    //         $callCard->fill($request->input());
    //         $callCard->save();
    //         Session::flash('success', 'Cập nhật thành công');

    //     }catch(\Exception $err){
    //         Session::flash('error', $err->getMessage());
    //         return false;
    //     }
    //     return true;
    // }

    public function delete($request){
        $user = CallCard::where('id', $request->input('id'))->first();
        if($user){
            $user->delete();
            return true;
        }
        return false;
    }
}
