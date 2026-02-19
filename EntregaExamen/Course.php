<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    // Permitimos la asignación masiva de estos campos
    protected $fillable = ['name', 'description', 'status'];

    /**
     * Obtener los estudiantes de este curso.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}