<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    public bool $timestamps = false;

    protected $fillable = [
        'model_id',
        'price_for_period',
        'deposit_for_period',
        'full_price_for_period',
        'period_min',
        'period_max'
    ];

    public function model()
    {
        return $this->belongsTo(ProkatModel::class, 'model_id');
    }

}
