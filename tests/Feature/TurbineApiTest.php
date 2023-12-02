<?php

namespace Tests\Feature;

use App\Models\Farm;
use App\Models\Turbine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TurbineApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_turbines_for_farm()
    {
        $farm = Farm::factory()->create();

        $turbines = Turbine::factory()->count(3)->create(['farm_id' => $farm->id]);

        $response = $this->get("/api/farms/{$farm->id}/turbines");

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonFragment(['id' => $turbines[0]->id])
            ->assertJsonFragment(['id' => $turbines[1]->id])
            ->assertJsonFragment(['id' => $turbines[2]->id]);
    }

    public function test_get_turbine_by_farm_and_id()
    {
        $farm = Farm::factory()->create();

        $turbine = Turbine::factory()->create(['farm_id' => $farm->id]);

        $response = $this->get("/api/farms/{$farm->id}/turbines/{$turbine->id}");

        $response->assertStatus(200)
            ->assertJson(['data' => ['id' => $turbine->id]]);
    }

    public function test_get_all_turbines()
    {
        $turbines = Turbine::factory()->count(5)->create();

        $response = $this->get('/api/turbines');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonFragment(['id' => $turbines[0]->id])
            ->assertJsonFragment(['id' => $turbines[1]->id])
            ->assertJsonFragment(['id' => $turbines[2]->id])
            ->assertJsonFragment(['id' => $turbines[3]->id])
            ->assertJsonFragment(['id' => $turbines[4]->id]);
    }

    public function test_get_turbine_by_id()
    {
        $turbine = Turbine::factory()->create();

        $response = $this->get("/api/turbines/{$turbine->id}");

        $response->assertStatus(200)
            ->assertJson(['data' => ['id' => $turbine->id]]);
    }
}
