<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCheck extends Model
{
    use HasFactory;

    protected $table = 'health_data';

    protected $fillable = ['name', 'email', 'answers'];

    protected $casts = [
        'answers' => 'array',
    ];
}
