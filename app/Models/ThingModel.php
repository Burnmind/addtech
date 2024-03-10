<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string name
 * @property string description
 * @property ModelFile[] modelFiles
 */
class ThingModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function modelFiles(): HasMany
    {
        return $this->hasMany(ModelFile::class);
    }
}
