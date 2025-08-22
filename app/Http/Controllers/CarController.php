<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Service\Car\DTO\CarData;
use App\Service\Car\Interfaces\CarServiceInterface;

class CarController extends Controller
{
    public function __construct(public CarServiceInterface $service) {}

    public function index()
    {
        $perPage = max(1, min(100, request()->integer('perPage', 15)));

        $paginator = $this->service
            ->paginate(perPage: $perPage)
            ->withQueryString();

        return CarResource::collection($paginator);
    }

    public function store(CarRequest $request)
    {

        $data = CarData::from($request->validated());
        $car = $this->service->create($data);

        return (new CarResource($car))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Car $car)
    {
        return new CarResource($car);
    }

    public function update(CarRequest $request, Car $car)
    {
        $data = CarData::from($request->validated());
        $car = $this->service->update($car, $data);

        return new CarResource($car);
    }

    public function destroy(Car $car)
    {
        $this->service->delete($car);

        return response()->json()
            ->setStatusCode(204);
    }
}
