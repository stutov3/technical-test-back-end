<?php

namespace Tests\Unit\Services;

use App\Models\Farm;
use App\Services\FarmService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Services\FarmService */
    private FarmService $farmService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->farmService = new FarmService();
    }

    public function testItCanGetAllFarms()
    {
        Farm::factory()->count(3)->create();

        $farms = $this->farmService->getAllFarms();

        $this->assertCount(3, $farms);
    }

    public function testItCanGetSpecificFarmById()
    {
        $farm = Farm::factory()->create();

        $retrievedFarm = $this->farmService->getFarmById($farm->id);

        $this->assertEquals($farm->id, $retrievedFarm->id);
    }
}
