<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsNewCategoriesModel extends Model
{
    protected $table = 'whatsnew_categories';
    protected $fillable = ['name','status'];

    public function partnerBrand()
    {
        $this->hasOne(WhatsNewModel::class, 'category_id', 'id');
    }
}
