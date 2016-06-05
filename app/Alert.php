<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'indexalerts';

    protected $fillable = [
        'title', 'message', 'active'
    ];
}
