<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use DB;

class ReportModel extends Model
{
    use CrudTrait;
    protected $table = 'report';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'user_id', 'email', 'reason_report', 'content', 'method', 'article_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Lease() {
        return $this->belongsTo('App\Models\ArticleForLeaseModel', 'article_id');
    }

    public function Buy() {
        return $this->belongsTo('App\Models\ArticleForBuyModel', 'article_id');
    }
}
