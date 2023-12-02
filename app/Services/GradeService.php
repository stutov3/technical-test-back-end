<?php

namespace App\Services;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Collection;

class GradeService
{
    public function getAllGrades(): Collection
    {
        return Grade::all();
    }

    public function getGradeById(int $gradeID): ?Grade
    {
        return Grade::find($gradeID);
    }

    public function getGradesByComponentId(int $componentID): Collection
    {
        return Grade::where('component_id', $componentID)->get();
    }

    public function getGradeByComponentIdAndId(int $componentID, int $gradeID): ?Grade
    {
        return Grade::where('component_id', $componentID)->find($gradeID);
    }

    public function getGradesByInspectionId(int $inspectionID): Collection
    {
        return Grade::where('inspection_id', $inspectionID)->get();
    }

    public function getGradeByInspectionIdAndId(int $inspectionID, int $gradeID): ?Grade
    {
        return Grade::where('inspection_id', $inspectionID)->find($gradeID);
    }
}
