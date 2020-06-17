<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    protected $fillable = [
        'name',
    ];

    public function professionnels()
    {
        return $this->hasMany(Professionnel::class);
    }
}
