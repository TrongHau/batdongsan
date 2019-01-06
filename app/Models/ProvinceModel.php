<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProvinceModel extends Model
{
    public $timestamps = false;
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $fillable = ['_name', '_code'];
}
