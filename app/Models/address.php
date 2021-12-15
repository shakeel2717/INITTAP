<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'name', 'address', 'city', 'country', 'zip'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

