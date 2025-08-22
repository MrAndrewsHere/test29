<?php

namespace App\Http\Resources;

use App\Models\CModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CModel */
class CModelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'brand_id' => $this->brand_id,

            'brand' => new BrandResource($this->whenLoaded('brand')),
        ];
    }
}
