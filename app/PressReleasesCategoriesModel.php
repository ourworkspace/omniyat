<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressReleasesCategoriesModel extends Model
{
    protected $table = 'press_releases_categories';
    protected $fillable = ['name','status'];

    public function pressReleases()
    {
        return $this->hasOne(PressReleasesModel::class, 'category_id', 'id');
    }
}
