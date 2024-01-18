<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Violation\ViolationService;
use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    protected $violationService;
    public function __construct(ViolationService $violationService){
        $this->violationService = $violationService;
    }

    public function create(){
        return view("Admin.Violations.add",["title"=> "Thêm Phiếu phạt",
        'user_id'=> $this->violationService->get(),
    ]);
    }

    public function store(Request $request){
        
        $result =$this->violationService->create($request);
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Violations.list",["title"=> "Danh sách Phiếu phạt",
        'violations'=> $this->violationService->getAll()
    ]);
    }

    public function show(Violation $violation){
        return view("Admin.Violations.edit",["title"=> "Chỉnh sửa Phiếu phạt" . $violation->id,
        'violations'=> $violation,
        'user_id'=> $this->violationService->get(),
    ]);
    }

    public function update(Violation $violation, Request $request){
        $this-> violationService->update($violation,$request);
        return redirect('/admin/violations/list');
    }

    public function destroy(Request $request){
        $result=$this->violationService->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
