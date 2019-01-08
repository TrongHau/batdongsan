<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ArticleTagModel extends Model
{
    protected $table = 'article_tag';
    protected $primaryKey = 'id';
    protected $fillable = ['article_id', 'tag_id'];
}
