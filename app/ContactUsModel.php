<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    protected $table = 'contact_us';
    protected $fillable = ['type','title','description','status'];
}
