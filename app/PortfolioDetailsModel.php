<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioDetailsModel extends Model
{
    protected $table = 'portfolios_details';
    protected $fillable = ['portfolio_id','tab_name','theme_color','text_alignment','background_image','logo','title','description_1','description_2','description_3','option_type','option_title','amenities','upload','status','links'];

    public function portfolio(){
        return $this->belongsTo(PortfoliosModel::class,'portfolio_id','id');
    }

    public function portfolioGallery(){
        return $this->belongsTo(PortfolioGalleryDetailsModel::class,'tab_id','id');
    }
}
