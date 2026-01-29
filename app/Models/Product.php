<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = [
        "active" => 1,
        "inactive" => 0
    ];

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'price',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
