<?php

namespace Tests\Unit\Services;

use App\Models\Grade;
use App\Services\GradeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GradeServiceTest extends TestCase
{
    use RefreshDatabase;

    protected GradeService $gradeService;

    public function setUp(): void
    {
        parent::setUp();

        $this->gradeService = new GradeService();
    }

    public function testGetAllGrades()
    {
        $grades = Grade::factory()->count(3)->create();

        $result = $this->gradeService->getAllGrades();

        $this->assertCount(3, $result);
        $this->assertEquals($grades->toArray(), $result->toArray());
    }

    public function testGetGradeById()
    {
        $grade = Grade::factory()->create();

        $result = $this->gradeService->getGradeById($grade->id);

        $this->assertEquals($grade->toArray(), $result->toArray());
    }

    public function testGetGradesByComponentId()
    {
        $componentId = 1;
        $grades = Grade::factory()->count(2)->create(['component_id' => $componentId]);

        $result = $this->gradeService->getGradesByComponentId($componentId);

        $this->assertCount(2, $result);
        $this->assertEquals($grades->toArray(), $result->toArray());
    }

    public function testGetGradeByComponentIdAndId()
    {
        $componentId = 1;
        $grade = Grade::factory()->create(['component_id' => $componentId]);

        $result = $this->gradeService->getGradeByComponentIdAndId($componentId, $grade->id);

        $this->assertEquals($grade->toArray(), $result->toArray());
    }

    public function testGetGradesByInspectionId()
    {
        $inspectionId = 1;
        $grades = Grade::factory()->count(2)->create(['inspection_id' => $inspectionId]);

        $result = $this->gradeService->getGradesByInspectionId($inspectionId);

        $this->assertCount(2, $result);
        $this->assertEquals($grades->toArray(), $result->toArray());
    }

    public function testGetGradeByInspectionIdAndId()
    {
        $inspectionId = 1;
        $grade = Grade::factory()->create(['inspection_id' => $inspectionId]);

        $result = $this->gradeService->getGradeByInspectionIdAndId($inspectionId, $grade->id);

        $this->assertEquals($grade->toArray(), $result->toArray());
    }
}
