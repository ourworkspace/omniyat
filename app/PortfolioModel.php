<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{
    protected $table = 'portfolio';
    protected $fillable = ['category_id','project_name','title','subtitle','logo','slide_images','amenities','description','location','status','order_no'];

    public function category(){
        return $this->belongsTo(CategoriesModel::class,'category_id','id');
    }
}
