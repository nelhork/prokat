<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'phone1', 'phone2', 'phone3', 'comment'];

    public static function findByPhone(string $phone): Client | null
    {
        return Client::where('phone1', $phone)
            ->orWhere('phone2', $phone)
            ->orWhere('phone3', $phone)
            ->first();
    }
}
