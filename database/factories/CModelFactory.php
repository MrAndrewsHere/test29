<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\CModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CModelFactory extends Factory
{
    protected $model = CModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'brand_id' => Brand::factory(),
        ];
    }
}
