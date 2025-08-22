<?php

namespace App\Service\Car\DTO;

use App\Service\Car\Enums\Color;
use Spatie\LaravelData\Data;

class CarData extends Data
{
    public function __construct(
        public ?int $mileage,
        public ?int $year,
        public ?Color $color,
        public int $c_model_id,
    ) {}
}
