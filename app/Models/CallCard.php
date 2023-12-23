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

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function detail(){
        return $this->hasOne(DetailCallCard::class, 'id_call_card', 'id');
    }
    
}
//hasOne->mối quan hệ 1:1
//belongsTo->Mối quan hệ n:1
//hasMany->mối quan hệ 1:n