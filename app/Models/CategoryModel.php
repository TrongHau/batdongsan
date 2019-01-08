<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['parent_id', 'lft', 'rgt', 'depth', 'name', 'slug'];
}
