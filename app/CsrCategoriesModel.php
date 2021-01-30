<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsrCategoriesModel extends Model
{
    protected $table = 'csr_categories';
    protected $fillable = ['name','status'];

    public function csrDetails()
    {
        return $this->hasMany(CsrModel::class, 'category_id', 'id');
    }
}
