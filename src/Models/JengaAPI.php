<?php

namespace NjoguAmos\JengaAPI\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JengaAPI extends Model
{
    use HasFactory;

    /** @var array<string,string> */
    public $casts = [
        'access_token' => 'encrypted',
        'refresh_token' => 'encrypted',
        'expires_in' => 'datetime',
        'issued_at' => 'datetime',
    ];

}