<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class TypeModel extends Model
{
    public $timestamps = false;
    protected $table = 'type';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'url', 'parent_id'];
}
