<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookRequest;
use App\Http\Services\Book\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return view("Admin.Books.list",["title"=> "Danh sách Sách",
        'books'=>$this->bookService->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Books.add",["title"=> "Thêm Sách",
        'category_id'=> $this->bookService->getCategory(),
        'producer_id'=> $this->bookService->getProducer(),
        'language_id'=> $this->bookService->getLanguage(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $this->bookService->insert($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("Admin.Books.edit",["title"=> "Chỉnh sửa Sách" . $book->id,
        'book'=> $book,
        'category_id'=> $this->bookService->getCategory(),
        'producer_id'=> $this->bookService->getProducer(),
        'language_id'=> $this->bookService->getLanguage(),
        'author_id'=> $this->bookService->getAuthor(),
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->bookService->update($request, $book);
        return redirect('/admin/books/list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
