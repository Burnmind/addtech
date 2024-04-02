<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property string name
 * @property string description
 * @property Collection<int, ModelFile> modelFiles
 * @property Carbon created_at
 * @property Carbon updated_at
 *
 * @method LengthAwarePaginator paginate(int $perPage)
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

    public function getArchiveName(): string
    {
        return md5($this->name . $this->updated_at->toString()) . $this->id;
    }
}
