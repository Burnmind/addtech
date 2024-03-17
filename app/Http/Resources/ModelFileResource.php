<?php

namespace App\Http\Resources;

use App\Models\ModelFile;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ModelFile resource
 */
class ModelFileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'file' => new FileResource($this->resource->file)
        ];
    }
}
