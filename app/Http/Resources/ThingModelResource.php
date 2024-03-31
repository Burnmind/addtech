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
        $imageFiles = array_filter(
            $this->resource->modelFiles->getDictionary(),
            fn (ModelFile $item) => in_array($item->file->mime_type, MimeType::getImageTypes())
        );
        $detailFiles = array_filter(
            $this->resource->modelFiles->getDictionary(),
            fn (ModelFile $item) => in_array($item->file->mime_type, MimeType::getDetailTypes())
        );

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'modelImageFiles' => ModelFileResource::collection($imageFiles),
            'modelDetailFiles' => ModelFileResource::collection($detailFiles)
        ];
    }
}
