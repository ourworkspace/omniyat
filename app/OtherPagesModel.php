<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherPagesModel extends Model
{
    protected $table = 'other_pages';
    protected $fillable = ['title','description','status'];
}
