<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnersbrandsModel extends Model
{
    protected $table = 'partners_brands';
    protected $fillable = ['category_id','name','image','status'];

    public function category()
    {
        $this->belongsTo(PartnersbrandsCategoriesModel::class, 'category_id', 'id');
    }
}
