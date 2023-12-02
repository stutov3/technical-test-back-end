<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    /**
     * ToDo will be implemented
     * @return BelongsTo
     */
    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'inspection_id');
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class, 'component_id');
    }

    public function gradeType(): BelongsTo
    {
        return $this->belongsTo(GradeType::class, 'grade_type_id');
    }
}
