<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OmniyatTCPModel extends Model
{
    protected $table = 'tcp_data';
    //1 Privacy Policy, 2 - Terms & conductions
    protected $fillable = ['type','sub_title','title','description','status'];
}
