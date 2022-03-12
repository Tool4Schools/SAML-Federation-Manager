<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Federation extends Model
{
    use HasFactory;

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function members()
    {
        $this->belongsToMany(ServiceProvider::class);
    }
}
