<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressKitModel extends Model
{
    protected $table = 'press_kit';
    protected $fillable = ['category_id','title','thumb_image','large_image','pdf_file','status'];

    public function category()
    {
        return $this->belongsTo(PressKitCategoriesModel::class, 'category_id', 'id');
    }
}
