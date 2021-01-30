<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsNewModel extends Model
{
    protected $table = 'whatsnew';
    protected $fillable = ['category_id','title','short_description','long_description','thumb_image','large_image','date','status'];

    public function category()
    {
        $this->belongsTo(WhatsNewCategoriesModel::class, 'category_id', 'id');
    }
}
