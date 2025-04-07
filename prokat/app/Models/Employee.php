<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['comment', 'name', 'phone1', 'phone2', 'phone3', 'login', 'password', 'status'];
}
