<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'link',
        'clicks'
    ];

}
