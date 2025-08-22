<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Car */
class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'mileage' => $this->mileage,
            'year' => $this->year,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'c_model_id' => $this->c_model_id,

            'cModel' => new CModelResource($this->whenLoaded('cModel')),
        ];
    }
}
