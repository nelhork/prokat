<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelToOrder extends Model
{
    protected $fillable = ['count', 'price', 'deposit', 'order_id', 'model_id'];
    protected string $table = 'models_to_orders';
    public bool $timestamps = false;
}
