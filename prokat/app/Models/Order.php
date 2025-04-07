<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    public bool $timestamps = false;
    protected $fillable = ['comment', 'begin_at', 'end_at', 'delivery_address_to', 'delivery_address_from',
        'delivery_price', 'total_amount', 'total_deposit', 'status_id', 'client_id', 'giver_id', 'taker_id',
        'give_stock_id', 'take_stock_id'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function giver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'giver_id');
    }

    public function taker(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'taker_id');
    }

    public function giverStock(): BelongsTo
    {
        return $this->belongsTo(Stock::class, 'give_stock_id');
    }

    public function takerStock(): BelongsTo
    {
        return $this->belongsTo(Stock::class, 'take_stock_id');
    }

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(
            ProkatModel::class,
            'models_to_orders',
            'order_id',
            'model_id')
            ->withPivot(['count', 'price', 'deposit']);
    }
}
