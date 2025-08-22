<?php

namespace App\Service\Car\Interfaces;

use App\Models\Car;
use App\Service\Car\DTO\CarData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Service layer for Car domain logic and persistence operations.
 */
interface CarServiceInterface
{
    /**
     * Paginate cars list.
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    /**
     * Create a new Car from DTO.
     */
    public function create(CarData $data): Car;

    /**
     * Update the given Car with DTO.
     */
    public function update(Car $car, CarData $data): Car;

    /**
     * Soft delete the given Car.
     */
    public function delete(Car $car): void;
}
