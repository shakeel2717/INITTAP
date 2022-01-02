<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardOrder extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'pricing_id', 'card_title', 'card_designation' , 'about', 'logo', 'type'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricing()
    {
        return $this->belongsTo(pricing::class);
    }



}
