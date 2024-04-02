<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;


/**
 * @property int id
 * @property string path
 * @property string name
 * @property string mime_type
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class File extends Model
{
    use HasFactory;

    public function modelFile(): HasOne
    {
        return $this->hasOne(ModelFile::class);
    }
}
