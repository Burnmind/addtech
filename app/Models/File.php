<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @property int id
 * @property string path
 * @property string name
 * @property string mime_type
 */
class File extends Model
{
    use HasFactory;

    public function modelFile(): HasOne
    {
        return $this->hasOne(ModelFile::class);
    }
}
