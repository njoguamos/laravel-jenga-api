<?php

namespace NjoguAmos\Jenga\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use NjoguAmos\Jenga\Models\Jenga;

/** @extends Factory<Jenga> */
class JengaFactory extends Factory
{
    protected $model = Jenga::class;

    public function definition()
    {
        return [
            'refresh_token' => Str::random(1000),
            'access_token'  => Str::random(40),
            'expires_in'    => now()->addMinutes(50),
            'issued_at'     => now(),
        ];
    }
}