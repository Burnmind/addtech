<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelCreateRequest;
use App\Models\File;
use App\Models\ModelFile;
use App\Models\ThingModel;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ModelController extends Controller
{
    public function add(): Response
    {
        return Inertia::render('Model/Add');
    }

    public function create(ModelCreateRequest $request): bool
    {
        $thingModel = new ThingModel();
        $thingModel->name = $request->name;
        $thingModel->description = $request->description;
        $thingModel->save();

        /** @var UploadedFile[] $files */
        $files = $request->file('files');
        foreach ($files as $file) {
            $path = Storage::putFile('models', $file);
            $file = new File();
            $file->path = $path;
            $file->save();

            $modelFile = new ModelFile();
            $modelFile->file_id = $file->id;
            $modelFile->thing_model_id = $thingModel->id;
            $modelFile->save();
        }

        return true;
    }
}
