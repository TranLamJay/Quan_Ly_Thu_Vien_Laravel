<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallCard;
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
}
