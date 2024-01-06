<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Book;
use App\Models\CallCard;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\DetailCallCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(OrderRequest $request) {
        $data = $request->validated();

        // decode json cái books lại cho ra array
        $cart = Cart::query()
        ->where('user_id', $data['user_id'])
        ->first();

        $books = CartDetail::query()
        ->where('cart_id', $cart->id)
        ->get();

        if ($books->isEmpty()) {
            return response()->json(['message' => 'Giỏ hàng trống'], 422);
        }

        // mở ra transaction để phòng lỗi thì mình quay lại không thêm vào sql
        DB::beginTransaction();

        // tạo order
        $order = CallCard::query()->create([
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'return_date' => $data['end_date'],
            'borrowing_date' => Carbon::now(),
            'form' => $data['form'],
            'user_id' => $data['user_id'],
            'status' => 0
        ]);

        $bookValues = [];

        // lặp qua để format cái book lại để thêm vào detail
        // đồng thời là trừ cái số lượng của cuốn sách. nếu số lượng không đủ để trừ, đồng nghĩa với việc nó nhập lỗi.
        foreach ($books as $book) {
            $bookValue = [];
            $bookValue['id_book'] = $book->book_id;
            $bookValue['id_call_card'] = $order->id;
            $bookValue['quantity'] = 1;

            $bookValues[] = $bookValue;
            $bookFind = Book::query()->find($book->book_id);
            $quantity = $bookFind->quantity - 1;
            
            // kiểm tra nếu trừ mà bé hơn 0 thì nó mượn sách mà nó mượn láo
            if ($quantity < 0) {
                DB::rollBack();
                return response()->json(['message' => "Sách {$bookFind->name} không đủ số lượng"], 422);
            }
            // dòng này để sửa thông tin về số lượng nè
            // xóa cái dòng update số lượng này đi.
            // $bookFind->update(['quantity' => $quantity]);
        }
        // thêm tất cả các cuốn sách được mượn vào detail.
        DetailCallCard::insert($bookValues);

        CartDetail::query()
        ->where('cart_id', $cart->id)
        ->delete();

        // commit sql
        DB::commit();
        return response()->json('Thành công', 201);
    }
}
