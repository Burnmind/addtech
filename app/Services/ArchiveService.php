<?php

namespace App\Services;

use App\Models\ThingModel;
use Illuminate\Support\Facades\Storage;

class ArchiveService
{
    public function packThingModelFiles(ThingModel $thingModel): string
    {
        $publicArchivePath = $this->getArchivePath($thingModel->getArchiveName());

        if (Storage::exists($publicArchivePath)) {
            return $publicArchivePath;
        }

        $archivePath = Storage::path($publicArchivePath);
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
        $path = 'public' . DIRECTORY_SEPARATOR . 'archives';
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        return $path . DIRECTORY_SEPARATOR . $name . '.zip';
    }
}