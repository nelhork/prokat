<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['comment', 'name', 'amount', 'status'];
}
