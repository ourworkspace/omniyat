<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProjectSlider1Model extends Model
{
    protected $table = 'projects_slider_1';
    protected $fillable = ['project_id','title','sub_title','image','status'];

    public function featureProjectSlider1()
    {
        return $this->belongsTo(FeatureProjectModel::class,'project_id','id');
    }
}
