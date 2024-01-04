<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Thêm một sách vào giỏ hàng
    public function addProductToCart(CartRequest $request) {
        DB::beginTransaction();
        $data = $request->validated();
        try {
            // lấy ra cart của user, nếu k có thì tạo mới
            $cart = Cart::firstOrCreate([
                'user_id' => $data['user_id']
            ]);

            // lấy ra sách có trong giỏ hàng.
            $cartDetailExist = CartDetail::query()
            ->where('book_id', '=', $data['book_id'])
            ->where('cart_id', '=', $cart->id)
            ->first();

            // nếu sách đã tồn tại thì trả về lỗi conflict
            if ($cartDetailExist) {
                DB::commit();
                return response()->json("Sách đã tồn tại trong giỏ hàng", 409);
            }

            // không thì tạo sách mới sau đó trả về mã tạo thành công
            CartDetail::query()->create([
                'book_id' => (int) $data['book_id'],
                'cart_id' => $cart->id,
            ]);

            DB::commit();

            return response()->json("Thêm sách thành công", 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json("Thêm sách thất bại", 500);
        }
    }

    public function countProductIncart(Request $request) {
        $user_id = $request->get('user_id');
        
        $cart = Cart::firstOrCreate([
            'user_id' => $user_id
        ]);

        // lấy ra sách có trong giỏ hàng.
        $cartCount = CartDetail::query()
        ->where('cart_id', '=', $cart->id)
        ->count();

        return response()->json($cartCount ?? 0);
    }

    public function getProductIncart(Request $request) {
        $user_id = $request->get('user_id');
        
        $cart = Cart::firstOrCreate([
            'user_id' => $user_id
        ]);

        // lấy ra sách có trong giỏ hàng.
        $carts = CartDetail::query()
        ->select('cart_details.*', 'book.name', 'book.image')
        ->join('book', 'book.id', '=', 'cart_details.book_id')
        ->where('cart_id', '=', $cart->id)
        ->get();

        return response()->json($carts);
    }

    public function removeProductInCart($cartDetailId) {
        // lấy ra sách có trong giỏ hàng.
        CartDetail::query()
        ->find($cartDetailId)
        ->delete();

        return response()->json('Thành công');
    }

}
