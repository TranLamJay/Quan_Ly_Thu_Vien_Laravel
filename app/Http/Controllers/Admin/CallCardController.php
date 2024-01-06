<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CallCard\CallCardService;
use App\Models\Book;
use App\Models\CallCard;
use App\Models\DetailCallCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallCardController extends Controller
{
    protected $callCardService;

    public function __construct(CallCardService $callCardService)
    {
        $this->callCardService = $callCardService;
    }

    public function index()
    {
        // dd($this->callCardService->get());
        return view("Admin.CallCard.list", [
            "title" => "Danh sách Phiếu mượn",
            'callCards' => $this->callCardService->get(),
        ]);
    }

    public function detail(CallCard $callCard)
    {
        return view("Admin.CallCard.detail", [
            "title" => "Chi tiết phiếu mượn/" . $callCard->id,
            'callCards' => $this->callCardService->get(),
            'users' => $callCard->User()->get(),
            'detail' => $callCard->detail()->with('book')->get(),
        ]);
    }

    public function handleExtend($id, Request $request)
    {
        $callCard = CallCard::query()->find($id);
        $extend = $request->get('extend');

        if (!$extend || !$callCard) {
            return redirect()->back();
        }

        if ($extend == -1) {
            $callCard->update([
                'extend' => $extend
            ]);

            return redirect()->back()->with('status', 'Không cho phép gia hạn thành công');
        }

        // Lấy ngày hiện tại
        $now = Carbon::now();

        // Thêm 14 ngày vào ngày hiện tại
        $returnDate = $now->addDays(14);


        $callCard->update([
            'extend' => 0,
            'return_date' => $returnDate
        ]);

        return redirect()->back()->with('status', 'Gia hạn thành công');
    }

    public function handleStatus($id, Request $request)
    {
        $callCard = CallCard::query()->find($id);
        $status = $request->get('status');
        $prevStatus = $callCard->status;

        if (!$status || !$callCard) {
            return redirect()->back();
        }

        DB::beginTransaction();
        $callCardDetails = DetailCallCard::query()
            ->where('id_call_card', $callCard->id)
            ->get();

        $callCard->update([
            'status' => $status
        ]);

        if ($status == 1) {
            foreach ($callCardDetails as $callCardDetail) {
                $book = Book::query()->find($callCardDetail->id_book);
                if ($book->quantity - 1 < 0) {
                    DB::rollBack();
                    return redirect()->back()->with('status', "Sách " . $book->name . " đã hết số lượng" );
                }
                $book->update(['quantity' => $book->quantity - 1]);
            }

            DB::commit();
            return redirect()->back()->with('status', 'Cho mượn thành công');
        }

        if ($status == 2) {
            if ($prevStatus == 1) {
                foreach ($callCardDetails as $callCardDetail) {
                    $book = Book::query()->find($callCardDetail->id_book);
                    $book->update(['quantity' => $book->quantity + 1]);
                }
            }

            $now = Carbon::now();
            $callCard->update(['return_date' => $now]);

            DB::commit();
            return redirect()->back()->with('status', 'Đã trả thành công');
        }

        if ($status == -1) {
            if ($prevStatus == 1) {
                foreach ($callCardDetails as $callCardDetail) {
                    $book = Book::query()->find($callCardDetail->id_book);
                    $book->update(['quantity' => $book->quantity + 1]);
                }
            }

            DB::commit();
            return redirect()->back()->with('status', 'Đã hủy thành công');
        }
    }

    public function show(CallCard $callCard)
    {
        return view("Admin.CallCard.edit", [
            "title" => "Chỉnh sửa Phiếu mượn" . $callCard->id,
            'callCards' => $callCard,
        ]);
    }

    // public function update(Request $request, CallCard $callCard)
    // {
    //     $this->callCardService->update($request, $callCard);
    //     return redirect('/admin/callCards/list');
    // }

    public function destroy(Request $request)
    {
        $result = $this->callCardService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
