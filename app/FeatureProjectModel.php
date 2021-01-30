<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProjectModel extends Model
{
    protected $table = 'projects';
    protected $fillable = ['portfolio_id','explore_label','status'];


    public function project()
    {
        return $this->belongsTo(PortfolioModel::class,'portfolio_id','id');
    }

    public function sliderOne()
    {
        return $this->hasOne(FeatureProjectSlider1Model::class,'project_id', 'id');
    }

    public function sliderTwo()
    {
        return $this->hasMany(FeatureProjectSlider2Model::class,'project_id', 'id');
    }

    public function sliderThree()
    {
        return $this->hasMany(FeatureProjectSlider3Model::class,'project_id', 'id');
    }

}
