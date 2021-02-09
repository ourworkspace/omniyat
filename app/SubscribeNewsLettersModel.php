<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeNewsLettersModel extends Model
{
    protected $table = 'subscribe_newsletters';
    protected $fillable = ['email','_token','status'];
}
