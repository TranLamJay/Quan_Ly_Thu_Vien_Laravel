<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Author\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(){
        return view('User.Authors.author',["tilte"=>'Tác giả']);
    }

    public function detail(){
        return view('User.Authors.detail', ["title=>Tác giả chi tiết"]);
    }
}
