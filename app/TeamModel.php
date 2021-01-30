<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    protected $table = 'team';
    protected $fillable = ['name','image','designation','description','status'];
}
