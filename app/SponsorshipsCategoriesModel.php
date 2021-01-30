<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipsCategoriesModel extends Model
{
    protected $table = 'sponsorships_categories';
    protected $fillable = ['name','status'];

    public function SponsorshipsDetails()
    {
        return $this->hasMany(SponsorshipsModel::class, 'category_id', 'id');
    }
}
