<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSubTitlesModel extends Model
{
    protected $table = 'page_sub_titles';
    protected $fillable = ['page_type','sub_title','status'];

}
