<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'title', 'slug', 'short_content', 'content', 'image', 'status', 'featured', 'views'];
}
