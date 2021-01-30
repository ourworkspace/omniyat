<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignModel extends Model
{
    protected $table = 'design';
    protected $fillable = ['type','design_type','title','summary','image','status'];
}
