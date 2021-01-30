<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilosophyModel extends Model
{
    protected $table = 'philosophy';
    //1 - About Company, 2 - chairman-newsletter
    protected $fillable = ['description_1','image_1','image_2_1','description_2','image_2_2','description_3','image_3','title_3','status','created_at','updated_at','sub_title','title_4_1','title_4_2','button_text','button_url'];
}
