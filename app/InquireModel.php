<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InquireModel extends Model
{
    protected $table = 'inquire_details';
    protected $fillable = ['first_name','last_name','email','mobile','message','request_from','request_url','purpose','comment_message','mail_status'];
}
