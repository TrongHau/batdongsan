<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class DistrictModel extends Model
{
    public $timestamps = false;
    protected $table = 'district';
    protected $primaryKey = 'id';
    protected $fillable = ['_name', '_prefix', '_province_id'];
}
