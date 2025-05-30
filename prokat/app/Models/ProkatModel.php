<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProkatModel extends Model
{
    protected string $table = 'models';
    protected $fillable = ['comment', 'name', 'type', 'photo1', 'photo2', 'photo3', 'video1', 'video2', 'video3', 'description1', 'description2', 'description3'];

    public function priceLists()
    {
        return $this->hasMany(PriceList::class, 'model_id');
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
            return Storage::url('models/' . $this['photo' . $index]);
        }
        return null;
    }

    public function video1Url(): string | null
    {
        return $this->getVideoUrl('1');
    }

    public function video2Url(): string | null
    {
        return $this->getVideoUrl('2');
    }

    public function video3Url(): string | null
    {
        return $this->getVideoUrl('3');
    }

    private function getVideoUrl(string $index): string | null
    {
        if ($this['video' . $index])
        {
            return Storage::url('models/' . $this['video' . $index]);
        }
        return null;
    }
}
