<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsOnMediaModel extends Model
{
    /*CREATE TABLE `travash_omniyat`.`omniyat_whats_on_media` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(200) NULL , `description` TEXT NULL , `image` VARCHAR(150) NULL , `date` VARCHAR(25) NULL , `status` INT NOT NULL DEFAULT '1' , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB COMMENT = 'Whats on media data';*/

    protected $table = 'whats_on_media';
    protected $fillable = ['title','short_description','long_description','thumb_image','large_image','pdf_file','date','status'];

}
