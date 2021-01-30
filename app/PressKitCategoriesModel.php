<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressKitCategoriesModel extends Model
{
    protected $table = 'press_kit_categories';
    protected $fillable = ['name','status'];

    public function pressKitDetails()
    {
        return $this->hasMany(PressKitModel::class, 'category_id', 'id');
    }
}
