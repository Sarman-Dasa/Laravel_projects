<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function language()
    {
        return $this->hasMany(Language::class);
    }

    public function deployment()
    {
        return $this->hasManyThrough(Deployment::class,Language::class);
    }
}
