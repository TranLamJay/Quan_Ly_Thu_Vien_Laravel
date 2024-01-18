<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Producer\ProducerService;
use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    protected $producerService;
    public function __construct(ProducerService $producerService){
        $this->producerService = $producerService;
    }

    public function create(){
        return view("Admin.Producers.add",["title"=> "Thêm Nhà xuất bản"
    ]);
    }

    public function store(Request $request){
        
        $result =$this->producerService->create($request);
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Producers.list",["title"=> "Danh sách Nhà xuất bản",
        'producers'=> $this->producerService->getAll()
    ]);
    }

    public function show(Producer $producer){
        return view("Admin.Producers.edit",["title"=> "Chỉnh sửa Nhà xuất bản" . $producer->id,
        'producers'=> $producer
    ]);
    }

    public function update(Producer $producer, Request $request){
        $this-> producerService->update($producer,$request);
        return redirect('/admin/producers/list');
    }

    public function destroy(Request $request){
        $result=$this->producerService->destroy($request);
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
