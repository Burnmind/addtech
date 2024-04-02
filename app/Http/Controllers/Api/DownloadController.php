<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\ThingModel;
use App\Services\ArchiveService;
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

    public function downloadAll(int $modelId, ArchiveService $archiveService): StreamedResponse
    {
        /** @var ThingModel $thingModel */
        $thingModel = ThingModel::query()->where(['id' => $modelId])->first();
        $path = $archiveService->packThingModelFiles($thingModel);
        return Storage::download($path, $thingModel->name . '.zip');
    }
}
