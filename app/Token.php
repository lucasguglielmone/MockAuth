<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    protected $table = 'user_token';

    protected $fillable = [
        'uid', 'token',
    ];
}
