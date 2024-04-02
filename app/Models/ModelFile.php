<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int file_id
 * @property int thing_model_id
 * @property File file
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class ModelFile extends Model
{
    use HasFactory;

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function thingModel(): BelongsTo
    {
        return $this->belongsTo(ThingModel::class);
    }
}
