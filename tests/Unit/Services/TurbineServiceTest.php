<?php

// tests/Unit/TurbineServiceTest.php

namespace Tests\Unit\Services;

use App\Models\Farm;
use App\Models\Turbine;
use App\Services\TurbineService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurbineServiceTest extends TestCase
{
    use RefreshDatabase;

    protected TurbineService $turbineService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->turbineService = new TurbineService();
    }

    public function testGetAllTurbines()
    {
        Turbine::factory()->count(3)->create();

        $turbines = $this->turbineService->getAllTurbines();

        $this->assertCount(3, $turbines);
        $this->assertInstanceOf(Turbine::class, $turbines->first());
    }

    public function testGetTurbineById()
    {
        $turbine = Turbine::factory()->create();

        $retrievedTurbine = $this->turbineService->getTurbineById($turbine->id);

        $this->assertEquals($turbine->toArray(), $retrievedTurbine->toArray());
        $this->assertInstanceOf(Turbine::class, $retrievedTurbine);
    }

    public function testGetTurbineByFarmIdAndId()
    {
        $farm = Farm::factory()->create();
        $turbine = Turbine::factory()->create(['farm_id' => $farm->id]);

        $retrievedTurbine = $this->turbineService->getTurbineByFarmIdAndId($farm->id, $turbine->id);

        $this->assertEquals($turbine->toArray(), $retrievedTurbine->toArray());
        $this->assertInstanceOf(Turbine::class, $retrievedTurbine);
    }

    public function testGetTurbinesForFarm()
    {
        $farm = Farm::factory()->create();
        Turbine::factory()->count(2)->create(['farm_id' => $farm->id]);

        $turbines = $this->turbineService->getTurbinesForFarm($farm->id);

        $this->assertCount(2, $turbines);
        $this->assertInstanceOf(Turbine::class, $turbines->first());
    }

    public function testGetTurbineByIdReturnsNullForNonexistentTurbine()
    {
        $nonexistentTurbineId = 1;

        $retrievedTurbine = $this->turbineService->getTurbineById($nonexistentTurbineId);

        $this->assertNull($retrievedTurbine);
    }

    public function testGetTurbineByFarmIdAndIdReturnsNullForNonexistentTurbine()
    {
        $farm = Farm::factory()->create();
        $nonexistentTurbineId = 1;

        $retrievedTurbine = $this->turbineService->getTurbineByFarmIdAndId($farm->id, $nonexistentTurbineId);

        $this->assertNull($retrievedTurbine);
    }

    public function testGetTurbinesForFarmReturnsEmptyCollectionForNonexistentFarm()
    {
        $nonexistentFarmId = 1;

        $turbines = $this->turbineService->getTurbinesForFarm($nonexistentFarmId);

        $this->assertCount(0, $turbines);
    }
}

