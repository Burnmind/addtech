<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThingModelResource;
use App\Models\ThingModel;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function main(Request $request): Response
    {
        return Inertia::render('Main', [
            'thingModelList' => $request->user() ? ThingModelResource::collection(ThingModel::paginate(16)) : []
        ]);
    }
}
