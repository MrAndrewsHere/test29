<?php

namespace App\Service\Car;

use App\Models\Car;
use App\Service\Car\DTO\CarData;
use App\Service\Car\Interfaces\CarServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Service layer for Car domain logic and persistence operations.
 */
class CarService implements CarServiceInterface
{
    /**
     * Paginate cars list.
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Car::query()->with(['cModel.brand'])
            ->paginate(
                perPage: $perPage
            );
    }

    /**
     * Create a new Car from DTO.
     */
    public function create(CarData $data): Car
    {
        $car = new Car($data->toArray());
        $car->save();

        return $car;
    }

    /**
     * Update the given Car with DTO.
     */
    public function update(Car $car, CarData $data): Car
    {
        $car->update($data->toArray());

        return $car;
    }

    /**
     * Soft delete the given Car.
     */
    public function delete(Car $car): void
    {
        $car->delete();
    }
}
