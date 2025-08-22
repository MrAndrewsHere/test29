<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CModel;
use App\Service\Car\Enums\Color;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'mileage' => $this->faker->randomNumber(),
            'year' => $this->faker->year(),
            'color' => Color::random()->value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'c_model_id' => CModel::factory(),
        ];
    }
}
