<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $with = ['article_category'];

    protected $fillable = [
        'title',
        'author_name',
        'image',
        'content',
        'article_category_id'
    ];

    protected $cast = [
        'created_at' => 'datetime'
    ];

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
