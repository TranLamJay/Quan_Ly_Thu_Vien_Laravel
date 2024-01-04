<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Language\LanguageService;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $languageService;
    public function __construct(LanguageService $languageService){
        $this->languageService = $languageService;
    }

    public function create(){
        return view("Admin.Languages.add",["title"=> "Thêm Ngôn Ngữ"
    ]);
    }

    public function store(Request $request){
        
        $result =$this->languageService->create($request);
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Languages.list",["title"=> "Danh sách Ngôn Ngữ",
        'languages'=> $this->languageService->getAll()
    ]);
    }

    public function show(Language $language){
        return view("Admin.Languages.edit",["title"=> "Chỉnh sửa Ngôn Ngữ" . $language->id,
        'languages'=> $language
    ]);
    }

    public function update(Language $language, Request $request){
        $this-> languageService->update($language,$request);
        return redirect('/admin/languages/list');
    }

    public function destroy(Request $request){
        $result=$this->languageService->destroy($request);
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
