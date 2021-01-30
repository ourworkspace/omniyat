<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioGalleryDetailsModel extends Model
{    
    protected $table = 'portfolios_details_gallery';
    protected $fillable = ['tab_id','title','image','type'];

    public function portfolioDetails(){
        return $this->belongsTo(PortfolioDetailsModel::class,'tab_id','id');
    }
}
