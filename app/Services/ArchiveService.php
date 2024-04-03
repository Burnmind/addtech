<?php

namespace App\Services;

use App\Models\ThingModel;
use Illuminate\Support\Facades\Storage;

class ArchiveService
{
    public function packThingModelFiles(ThingModel $thingModel): string
    {
        $publicArchivePath = $this->getArchivePath($thingModel->getArchiveName());
        $archivePath = Storage::path($publicArchivePath);

        if (file_exists($archivePath)) {
            return $publicArchivePath;
        }

        $archive = new \ZipArchive();
        $archive->open($archivePath, \ZipArchive::CREATE);

        foreach ($thingModel->getDetailFiles() as $modelFile) {
            $filepath = Storage::path($modelFile->file->path);
            $archive->addFile($filepath, $modelFile->file->name);
        }
        $archive->close();

        return $publicArchivePath;
    }

    private function getArchivePath(string $name): string
    {
        $publicPath = 'public' . DIRECTORY_SEPARATOR . 'archives';

        $realPath = Storage::path($publicPath);
        if (!file_exists($realPath)) {
            mkdir($realPath, recursive: true);
        }

        return $publicPath . DIRECTORY_SEPARATOR . $name . '.zip';
    }
}