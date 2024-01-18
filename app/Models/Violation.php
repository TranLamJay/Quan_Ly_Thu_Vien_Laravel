<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $table = "violations";

    protected $fillable = ([
        "id",
        "reason",
        "form",
        "date_violation",
        "user_id",
    ]);

    public $timestamps = false;

    public function user()
    {
        // hàm này lấy ra theo kiểu n:1
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
