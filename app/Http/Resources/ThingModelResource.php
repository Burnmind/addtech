<?php

namespace App\Http\Resources;

use App\Models\ThingModel;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ThingModel resource
 */
class ThingModelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'model_files' => ModelFileResource::collection($this->resource->modelFiles)
        ];
    }
}
