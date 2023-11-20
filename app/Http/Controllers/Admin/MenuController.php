<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Category;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create(){
        return view("Admin.Menus.add",["title"=> "Thêm Thể Loại"
    ]);
    }

    public function store(CreateFormRequest $request){
        
        $result =$this->menuService->create($request);
        return redirect()->back();
    }


    public function index(){
        return view("Admin.Menus.list",["title"=> "Danh sách Thể Loại",
        'categories'=> $this->menuService->getAll()
    ]);
    }

    public function show(Category $category){
        return view("Admin.Menus.edit",["title"=> "Chỉnh sửa Thể Loại" . $category->name,
        'category'=> $category
    ]);
    }

    public function update(Category $category, CreateFormRequest $request){
        $this-> menuService->update($category,$request);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request){
        $result=$this->menuService->destroy($request);
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
