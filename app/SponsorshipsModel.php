<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipsModel extends Model
{
    protected $table = 'sponsorships';
    protected $fillable = ['category_id','title','short_description','long_description','date','thumb_image','large_image','pdf_file','status'];

    public function category()
    {
        return $this->belongsTo(SponsorshipsCategoriesModel::class, 'category_id', 'id');
    }
}
