<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class songs extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel','zanger', 
    ];

    public function albums()
    {
        return $this->belongsToMany(albums::class);
    }
}
