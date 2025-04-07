<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

enum ItemStatus: string
{
    case Available = 'Доступен';
    case InUse = 'Выдан';
}

class Item extends Model
{
    protected $fillable = ['comment', 'photo1', 'photo2', 'photo3', 'status', 'model_id', 'stock_id'];

    public function model(): BelongsTo
    {
        return $this->belongsTo(ProkatModel::class);
    }

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
