<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCard extends Model
{
    use HasFactory;

    protected $table = "call_card";

    protected $fillable = ([
        "borrowing_date",
        "return_date",
        "status",
        "form",
        "user_id",
        'user_name',
        'user_email'
    ]);

    public $timestamps = false;
}
