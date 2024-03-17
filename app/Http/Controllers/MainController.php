<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThingModelResource;
use App\Models\ThingModel;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function main(): Response
    {
        return Inertia::render('Main', [
            'thingModelList' => ThingModelResource::collection(ThingModel::paginate(16))
        ]);
    }
}
