<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Book\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return view("User.Books.index",[
            "title"=> "Danh sách Sách",
            'categories'=> $this->bookService->getCategory(),
            'producers'=> $this->bookService->getProducer(),
            'languages'=> $this->bookService->getLanguage(),
            'authors'=> $this->bookService->getAuthor(),
        ]);
    }

    public function detail($id)
    {
        // lấy ra book và các relation ship
        $book = Book::query()
            ->with('category')
            ->with('producer')
            ->with('language')
            ->with('authors')
            ->where('id', $id)
            ->first()
        ;
        if (is_null($book)) {
            redirect()->back();
        }

        return view("User.Books.detail",[
            "title"=> "Danh sách Sách",
            'categories'=> $this->bookService->getCategory(),
            'book' => $book
        ]);
    }
}
