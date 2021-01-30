<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfoliosModel extends Model
{
    protected $table = 'portfolios';
    protected $fillable = ['category_id','project_name','title','logo','status','order_no','image'];

    public function category(){
        return $this->belongsTo(CategoriesModel::class,'category_id','id');
    }
    
    public function portfolioDetails(){
        return $this->hasMany(PortfolioDetailsModel::class,'portfolio_id','id');
    }
}
