<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function students():BelongsToMany{
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    // public function students():HasMany{
    //     return $this->hasMany(Student::class);
    // }

}
