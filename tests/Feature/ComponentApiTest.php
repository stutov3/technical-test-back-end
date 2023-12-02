<?php

namespace Tests\Feature;

use App\Models\Component;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_get_all_components()
    {
        $components = Component::factory()->count(2)->create();

        $response = $this->getJson('/api/components');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'component_type_id',
                        'turbine_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function test_it_can_get_a_specific_component()
    {
        $component = Component::factory()->create();

        $response = $this->getJson("/api/components/{$component->id}");

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $component->id,
                'component_type_id' => $component->component_type_id,
                'turbine_id' => $component->turbine_id,
                'created_at' => $component->created_at->toISOString(),
                'updated_at' => $component->updated_at->toISOString(),
            ]]);
    }

    public function test_it_can_get_all_components_for_a_turbine()
    {
        $turbine = Turbine::factory()->create();
        Component::factory()->create(['turbine_id' => $turbine->id]);

        $response = $this->getJson("/api/turbines/{$turbine->id}/components");

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'component_type_id',
                        'turbine_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function test_it_can_get_a_specific_component_for_a_turbine()
    {
        $turbine = Turbine::factory()->create();
        $component = Component::factory()->create(['turbine_id' => $turbine->id]);

        $response = $this->getJson("/api/turbines/{$turbine->id}/components/{$component->id}");

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $component->id,
                'component_type_id' => $component->component_type_id,
                'turbine_id' => $component->turbine_id,
                'created_at' => $component->created_at->toISOString(),
                'updated_at' => $component->updated_at->toISOString(),
            ]]);
    }
}
