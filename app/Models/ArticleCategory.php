<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    static public $categoryList = [
        "Donation",
        "Volunteer",
        "Education"
    ];

    protected $guarded = ['id'];

    public $timestamps = false;
}
