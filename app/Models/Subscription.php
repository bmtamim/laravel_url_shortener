<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'package_id',
        'package_name',
        'package_price',
        'billing_type',
        'links_limit',
        'links_period',
        'currency',
        'start_at',
        'end_at',
        'status',
    ];
}
