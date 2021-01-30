<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','image','status'];

    public function portfolio()
    {
        return $this->hasOne(PortfolioModel::class,'category_id','id');
    }
}
