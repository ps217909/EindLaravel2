<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class albums extends Model
{
    use HasFactory;

    protected $fillable = [
        'naam','jaar', 'verkocht',
    ];

    public function songs()
    {
        return $this->belongsToMany(songs::class);
    }
}
