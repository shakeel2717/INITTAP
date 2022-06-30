<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'document',
        'name',
        'phone',
        'address',
        'status',
    ];
}
