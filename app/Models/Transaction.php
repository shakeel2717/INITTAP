<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_id',
        'user_id',
        'type',
        'sum',
        'status',
        'reference',
    ];
}
