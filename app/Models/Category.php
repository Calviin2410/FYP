<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = [
        "active" => 1,
        "inactive" => 0
    ];

    protected $fillable = [
        'name',
        'image',
        'status'
    ];
}
