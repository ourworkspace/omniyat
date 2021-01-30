<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'aboutus';
    //1 - About Company, 2 - chairman-newsletter
    protected $fillable = ['type','title','image','description','status','sub_title','image_text','button_text','button_url'];
}
