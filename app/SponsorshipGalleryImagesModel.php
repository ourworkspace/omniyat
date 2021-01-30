<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipGalleryImagesModel extends Model
{    
    protected $table = 'sponsorship_gallery_images';
    protected $fillable = ['sponsorship_id','title','image'];

    public function sponsorshipDetails(){
        return $this->belongsTo(SponsorshipsModel::class,'sponsorship_id','id');
    }
}
