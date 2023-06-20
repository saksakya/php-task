<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    public function detail():HasOne
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function departments():BelongsToMany
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }

    // public function departments():BelongsTo
    // {
    //     return $this->belongsTo(Department::class);
    // }

}
