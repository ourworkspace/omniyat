<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressReleasesModel extends Model
{
    protected $table = 'press_releases';
    protected $fillable = ['category_id','title','short_description','long_description','thumb_image','large_image','pdf_file','date','status'];

    public function category()
    {
        return $this->belongsTo(PressReleasesCategoriesModel::class, 'category_id', 'id');
    }
}
