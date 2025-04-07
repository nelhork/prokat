<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movement extends Model
{
    protected $fillable = ['comment', 'item_id', 'from_stock_id', 'to_stock_id'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function fromStock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function toStock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
