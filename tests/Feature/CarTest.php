<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_cars(): void
    {
        Car::factory()->count(3)->create();

        $response = $this->getJson('/api/cars');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'mileage', 'year', 'color', 'c_model_id', 'created_at', 'updated_at'],
                ],
                'links',
                'meta',
            ]);
    }

    public function test_can_show_car(): void
    {
        $car = Car::factory()->create();

        $response = $this->getJson("/api/cars/{$car->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['id', 'mileage', 'year', 'color', 'c_model_id', 'created_at', 'updated_at'],
            ]);
    }

    public function test_can_create_car(): void
    {
        $carData = Car::factory()->raw();

        $response = $this->postJson('/api/cars', $carData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => ['id', 'mileage', 'year', 'color', 'c_model_id', 'created_at', 'updated_at'],
            ]);

        $this->assertDatabaseHas('cars', [
            'mileage' => $carData['mileage'],
            'year' => $carData['year'],
            'color' => $carData['color'],
        ]);
    }

    public function test_can_update_car(): void
    {
        $car = Car::factory()->create();
        $updateData = Car::factory()->raw();

        $response = $this->putJson("/api/cars/{$car->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['id', 'mileage', 'year', 'color', 'c_model_id', 'created_at', 'updated_at'],
            ]);

        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'mileage' => $updateData['mileage'],
            'year' => $updateData['year'],
            'color' => $updateData['color'],
        ]);
    }

    public function test_can_delete_car(): void
    {
        $car = Car::factory()->create();

        $response = $this->deleteJson("/api/cars/{$car->id}");

        $response->assertStatus(204);
        $this->assertSoftDeleted($car);

        $response = $this->deleteJson("/api/cars/{$car->id}");

        $response->assertStatus(404);
    }
}
