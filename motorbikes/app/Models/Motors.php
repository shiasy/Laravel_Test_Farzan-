<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;


class Motors extends Model
{
    use HasFactory;

    //protected $table = "motors";

    protected $fillable = [
        'company' ,
        'kind' ,
        'color' ,
        'weight' ,
        'price' ,
        'image' ,
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
