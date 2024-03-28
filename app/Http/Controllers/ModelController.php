<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelCreateRequest;
use App\Http\Resources\ThingModelResource;
use App\Models\File;
use App\Models\ModelFile;
use App\Models\ThingModel;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ModelController extends Controller
{
    public function add(): Response
    {
        return Inertia::render('Model/Add');
    }

    public function detail(int $id): Response
    {
        return Inertia::render('Model/Detail', [
            'thingModel' => new ThingModelResource(ThingModel::query()->where(['id' => $id])->first())
        ]);
    }

    public function create(ModelCreateRequest $request): bool
    {
        $thingModel = new ThingModel();
        $thingModel->name = $request->name;
        $thingModel->description = $request->description;
        $thingModel->save();

        /** @var UploadedFile[] $files */
        $files = $request->file('files');
        foreach ($files as $uploadedFile) {
            $path = Storage::putFile('public/models', $uploadedFile);
            $file = new File();
            $file->path = $path;
            $file->name = $uploadedFile->getClientOriginalName();
            $file->save();

            $modelFile = new ModelFile();
            $modelFile->file_id = $file->id;
            $modelFile->thing_model_id = $thingModel->id;
            $modelFile->save();
        }

        return true;
    }

    public function download(int $id): StreamedResponse
    {
        /** @var File $file */
        $file = File::query()->where(['id' => $id])->first();

        return Storage::download($file->path, $file->name);
    }
}
