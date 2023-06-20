<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
