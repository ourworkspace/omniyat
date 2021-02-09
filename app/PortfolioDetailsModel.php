<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioDetailsModel extends Model
{
    protected $table = 'portfolios_details';
    protected $fillable = ['portfolio_id','tab_name','theme_color','text_alignment','bg_image_position','grid_position','grid_container_position','grid_column','background_image','logo','title','description_1','description_2','description_3','option_type','option_title','amenities','upload','status','links','icon_image','sub_tab_name'];

    public function portfolio(){
        return $this->belongsTo(PortfoliosModel::class,'portfolio_id','id');
    }

    public function portfolioGallery(){
        return $this->belongsTo(PortfolioGalleryDetailsModel::class,'tab_id','id');
    }
}
