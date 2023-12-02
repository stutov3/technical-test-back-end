<?php

namespace App\Http\Controllers;

use App\Http\Resources\GradeResource;
use App\Services\GradeService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class GradeController extends Controller
{
    protected GradeService $gradeService;

    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }

    public function getAllGrades(): AnonymousResourceCollection
    {
        $grades = $this->gradeService->getAllGrades();

        return GradeResource::collection($grades);
    }

    public function getGradeById(int $gradeID): GradeResource
    {
        $grade = $this->gradeService->getGradeById($gradeID);

        return new GradeResource($grade);
    }

    public function getGradesByComponentId(int $componentID): AnonymousResourceCollection
    {
        $grades = $this->gradeService->getGradesByComponentId($componentID);

        return GradeResource::collection($grades);
    }

    public function getGradeByComponentIdAndId(int $componentID, int $gradeID): GradeResource
    {
        $grade = $this->gradeService->getGradeByComponentIdAndId($componentID, $gradeID);

        return new GradeResource($grade);
    }

    public function getGradesByInspectionId(int $inspectionID): AnonymousResourceCollection
    {
        $grades = $this->gradeService->getGradesByInspectionId($inspectionID);

        return GradeResource::collection($grades);
    }

    public function getGradeByInspectionIdAndId(int $inspectionID, int $gradeID): GradeResource
    {
        $grade = $this->gradeService->getGradeByInspectionIdAndId($inspectionID, $gradeID);

        return new GradeResource($grade);
    }
}
