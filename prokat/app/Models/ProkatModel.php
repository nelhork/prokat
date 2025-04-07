<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProkatModel extends Model
{
    protected string $table = 'models';
    protected $fillable = ['comment', 'name', 'type', 'photo1', 'photo2', 'photo3', 'video1', 'video2', 'video3', 'description1', 'description2', 'description3'];

    public function priceLists()
    {
        return $this->hasMany(PriceList::class, 'model_id');
    }

}
