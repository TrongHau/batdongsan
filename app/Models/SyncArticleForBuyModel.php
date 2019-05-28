<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Backpack\CRUD\CrudTrait;

class SyncArticleForBuyModel extends Model
{
    use CrudTrait;

    protected $table = 'articles_for_buy';
    protected $primaryKey = 'id';
    protected $fillable = ['method_article', 'type_article', 'user_id', 'title', 'content_article', 'image', 'status', 'province_id', 'province', 'district_id', 'district', 'ward_id', 'ward', 'street_id', 'street', 'address', 'area_from', 'price_from', 'area_to', 'price_to', 'gallery_image', 'contact_name', 'contact_address', 'contact_phone', 'contact_email', 'start_news', 'end_news', 'floor', 'point', 'ddlPriceType', 'status', 'views', 'aprroval', 'project', 'prefix_url',
    'method_article_url', 'type_article_url', 'province_url', 'district_url', 'ward_url', 'street_url', 'price_real', 'project', 'date_sync'];


}
