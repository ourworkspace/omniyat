<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProjectSlider3Model extends Model
{
    protected $table = 'projects_slider_3';
    protected $fillable = ['project_id','type','image','bp_image','bp_title','status'];

    public function featureProjectSlider3()
    {
        return $this->belongsTo(FeatureProjectModel::class,'project_id','id');
    }
}
