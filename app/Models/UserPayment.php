<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'type',
        'title',
        'account',
        'phone',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
