<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nerd extends Model
{
    protected $fillable = ['name', 'email', 'nerd_level'];
}
