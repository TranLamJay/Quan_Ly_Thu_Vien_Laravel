<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class BookController extends Controller
{
    public function all(Request $request)
    {
        // lấy ra các fillter trên request
        $nameFilter = $request->get('name');
        $categoryFilter = $request->get('category');
        $producerFilter = $request->get('producer');
        $authorFilter = $request->get('author');
        $languageFilter = $request->get('language');
        
        // lấy ra tất cả các sách dựa trên fillter
        $books = $this->findAllBook($nameFilter, $categoryFilter, $producerFilter, $authorFilter, $languageFilter);
        return response()->json($books);
    }

    public function findAllBook($nameFilter, $categoryFilter, $producerFilter, $authorFilter, $languageFilter) {
        $query = Book::query()
            ->with('category')
            ->with('producer')
            ->with('language')
            ->with('authors')
        ;

        //nếu có category và nó khác All thì lọc ra những cuốn sách dựa trên category này, tương tự cho các cái dưới
        if (isset($categoryFilter) && $categoryFilter !== 'All') {
            $query = $query->where('category_id', $categoryFilter);
        }

        if (isset($producerFilter) && $producerFilter !== 'All') {
            $query = $query->where('producer_id', $producerFilter);
        }

        if (isset($languageFilter) && $languageFilter !== 'All') {
            $query = $query->where('language_id', $languageFilter);
        }

        if (isset($authorFilter) && $authorFilter !== 'All') {
            $query = $query->whereHas('authors', function($qr) use ($authorFilter) {
                $qr->where('author.id', $authorFilter);
            });
        }

        return $query
            ->where('name', 'like', "%$nameFilter%")
            ->latest('id')
            ->paginate(10)
            ->toArray();
        
    }

    public function getAllBookByOrder() {
        $books = Book::query()
        ->where('quantity', '>', 0)
        ->get();

        return response()->json($books);
    }
}
