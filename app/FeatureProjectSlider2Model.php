<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProjectSlider2Model extends Model
{
    protected $table = 'projects_slider_2';
    protected $fillable = ['project_id','type','logo','image','bp_image','bp_title','status'];

    public function featureProjectSlider2()
    {
        return $this->belongsTo(FeatureProjectModel::class,'project_id','id');
    }
}
