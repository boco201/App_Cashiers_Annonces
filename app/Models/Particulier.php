<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Particulier extends Model
{
    protected $fillable = [
        'name',
    ];

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }
}
