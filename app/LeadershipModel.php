<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadershipModel extends Model
{
    protected $table = 'leadership';
    protected $fillable = ['leadership_name','leadership_designation','image','short_description','long_description','status','ordered_by'];

    
}
