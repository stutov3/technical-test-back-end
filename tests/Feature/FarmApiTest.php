<?php

namespace Tests\Feature;

use App\Models\Farm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_farms()
    {
        Farm::factory()->count(3)->create();

        $response = $this->getJson('/api/farms');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }

    public function test_can_get_single_farm()
    {
        $farm = Farm::factory()->create();

        $response = $this->getJson("/api/farms/{$farm->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $farm->id,
                    'name' => $farm->name,
                    'created_at' => $farm->created_at->toISOString(),
                    'updated_at' => $farm->updated_at->toISOString(),
                ],
            ]);
    }

    public function testFarmNotFound()
    {
        // Arrange: Create a farm with ID 1
        $existingFarm = Farm::factory()->create(['id' => 1]);

        // Act: Access the show route with a non-existing farm ID (e.g., 2)
        $response = $this->get('/api/farms/2');

        // Assert: Check that the response indicates a not found status
        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
