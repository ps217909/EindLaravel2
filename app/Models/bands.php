<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bands extends Model
{
    use HasFactory;

protected $fillable = [
        'naam','genre', 'onstaan','actieftot',
    ];
}
