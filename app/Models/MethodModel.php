<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MethodModel extends Model
{
    public $timestamps = false;
    protected $table = 'method';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'url'];
}
