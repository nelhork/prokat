<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelToOrder extends Model
{
    protected $fillable = ['count', 'price', 'deposit', 'order_id', 'model_id'];
    protected $table = 'models_to_orders';
    public $timestamps = false;
}
