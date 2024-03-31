<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\ThingModel;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function download(int $id): StreamedResponse
    {
        /** @var File $file */
        $file = File::query()->where(['id' => $id])->first();
        return Storage::download($file->path, $file->name);
    }

    public function downloadAll(int $modelId): StreamedResponse
    {
        /** @var ThingModel $thingModel */
        $thingModel = ThingModel::query()->where(['id' => $modelId])->first();

        $archive = new \ZipArchive();
        $archiveInStorage = 'public' . DIRECTORY_SEPARATOR .'temp' . DIRECTORY_SEPARATOR . sha1($thingModel->name) . $thingModel->id . '.zip';
        $archivePath = Storage::path($archiveInStorage);
        $archive->open($archivePath, \ZipArchive::CREATE);

        foreach ($thingModel->modelFiles as $modelFile) {
            $filepath = Storage::path($modelFile->file->path);
            $archive->addFile($filepath, $modelFile->file->name);
        }
        $downloadResponse = Storage::download($archiveInStorage, $thingModel->name . '.zip');

        return $downloadResponse;
    }
}
