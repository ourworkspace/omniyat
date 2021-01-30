<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnersbrandsCategoriesModel extends Model
{
    protected $table = 'partners_brands_categories';
    protected $fillable = ['name','status'];

    public function partnerBrand()
    {
        $this->hasOne(PartnersbrandsModel::class, 'category_id', 'id');
    }
}
