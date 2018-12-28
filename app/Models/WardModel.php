<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class WardModel extends Model
{
    public $timestamps = false;
    protected $table = 'ward';
    protected $primaryKey = 'id';
    protected $fillable = ['_name', '_prefix', '_province_id', '_district_id'];
}
