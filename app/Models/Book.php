<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";

    protected $fillable = ([
        "id",
        "name",
        "quantity",
        "date_add",
        "content",
        "image",
        "publishing_year",
        "category_id",
        "producer_id",
        "language_id"
    ]);

    public $timestamps = false;

    // hàm này lấy ra sự phụ thuộc giữa hai bảng
    public function authors()
    {
        // hàm này để kết nối theo kiểu n:n
        return $this->belongsToMany(Author::class, 'author_book',
            'book_id', 'author_id');
    }

    // hàm này lấy ra sự phụ thuộc giữa hai bảng
    public function category()
    {
        // hàm này lấy ra theo kiểu n:1
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // hàm này lấy ra sự phụ thuộc giữa hai bảng
    public function producer()
    {
        // hàm này lấy ra theo kiểu n:1
        return $this->belongsTo(Producer::class, 'producer_id', 'id');
    }
    // hàm này lấy ra sự phụ thuộc giữa hai bảng
    public function language()
    {
        // hàm này lấy ra theo kiểu n:1
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query=$query->where('name', 'like', '%'.$key.'%' );
        }
        return $query;
    }
    
}
