<?php

namespace Tests\Unit\Services;

use App\Models\Component;
use App\Models\Turbine;
use App\Services\ComponentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentServiceTest extends TestCase
{
    use RefreshDatabase;

    private $componentService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->componentService = new ComponentService();
    }

    public function testGetAllComponents()
    {
        Component::factory()->count(3)->create();

        $components = $this->componentService->getAllComponents();

        $this->assertCount(3, $components);
        $this->assertInstanceOf(Component::class, $components->first());
    }

    public function testGetComponentById()
    {
        $component = Component::factory()->create();

        $result = $this->componentService->getComponentById($component->id);

        $this->assertInstanceOf(Component::class, $result);
        $this->assertEquals($component->id, $result->id);
    }

    public function testGetComponentsByTurbineId()
    {
        $turbine = Turbine::factory()->create();
        Component::factory()->count(2)->create(['turbine_id' => $turbine->id]);

        $components = $this->componentService->getComponentsByTurbineId($turbine->id);

        $this->assertCount(2, $components);
        $this->assertInstanceOf(Component::class, $components->first());
    }

    public function testGetComponentByTurbineIdAndId()
    {
        $component = Component::factory()->create();

        $result = $this->componentService->getComponentByTurbineIdAndId($component->turbine_id, $component->id);

        $this->assertInstanceOf(Component::class, $result);
        $this->assertEquals($component->id, $result->id);
    }
}
