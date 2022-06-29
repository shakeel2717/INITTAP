<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'price',
        'img',
        'status',
    ];


    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
