<?php

namespace App\Http\Resources;

use App\Enums\MimeType;
use App\Models\ModelFile;
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
            'description' => $this->resource->description,
            'modelImageFiles' => ModelFileResource::collection($this->resource->getImageFiles()),
            'modelDetailFiles' => ModelFileResource::collection($this->resource->getDetailFiles())
        ];
    }
}
