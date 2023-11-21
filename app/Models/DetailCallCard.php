<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCallCard extends Model
{
    use HasFactory;

    protected $table = "details_call_card";

    protected $fillable = ([
        "id_book",
        "id_call_card",
        'quantity'
    ]);

    public $timestamps = false;
}
