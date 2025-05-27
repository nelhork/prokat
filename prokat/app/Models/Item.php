<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    public function photo1Url(): string | null
    {
        return $this->getPhotoUrl('1');
    }

    public function photo2Url(): string | null
    {
        return $this->getPhotoUrl('2');
    }

    public function photo3Url(): string | null
    {
        return $this->getPhotoUrl('3');
    }

    private function getPhotoUrl(string $index): string | null
    {
        if ($this['photo' . $index])
        {
            return Storage::url('items/' . $this['photo' . $index]);
        }
        return null;
    }
}
