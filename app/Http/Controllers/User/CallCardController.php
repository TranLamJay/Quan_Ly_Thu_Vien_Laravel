<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CallCard;
use App\Models\DetailCallCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallCardController extends Controller
{
    public function myBook() {
        $callCards = CallCard::query()->where('user_id', '=', Auth::id())->get();

        foreach ($callCards as $callCard) {
            $books = DetailCallCard::query()->select('*')
            ->join('book', 'details_call_card.id_book', '=', 'book.id')
            ->where('details_call_card.id_call_card', '=', $callCard['id'])
            ->get();
            $callCard['books'] = $books;
        }

        // dd($callCard);

        return view("User.Books.mybook",[
            "title"=> "Danh sách Sách đã mượn",
            'callCards' => $callCards
        ]);
    }

    public function requestExtend($id) {
        $callCard = CallCard::query()->find($id);
        if (!$callCard) {
            return redirect()->back();
        }
        
        $callCard->update([
            'extend' => 1
        ]);

        return redirect()->back()->with('status', 'Gia hạn thành công');
    }
}
