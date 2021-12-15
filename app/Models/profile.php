<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'address',
        'city',
        'country',
        'zip',
        'designation',
        'about',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
