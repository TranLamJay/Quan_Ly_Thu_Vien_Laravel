<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallCardController extends Controller
{
    protected $callCardService;

    public function __construct(CallCard $callCardService)
    {
        $this->callCardService = $callCardService;
    }

    public function index()
    {
        return view("Admin.CallCard.list",["title"=> "Danh sách Phiếu mượn",
        'callCards'=>$this->callCardService->get(),
        ]);
    }

    public function detail(CallCard $callCard){
        return view("Admin.CallCard.detail",["title"=> "Chi tiết phiếu mượn" . $callCard->id,
        'callCards'=> $this->callCardService->get(),
        'users'=>$callCard->User()->get(),
        'detail'=>$callCard->detail()->with('book')->get(),
        ]);
    }

    public function handleExtend($id, Request $request) {
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
}
