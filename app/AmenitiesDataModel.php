<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmenitiesDataModel extends Model
{
    protected $table = 'amenities_data';
    protected $fillable = ['name','image','icon','status'];
}
