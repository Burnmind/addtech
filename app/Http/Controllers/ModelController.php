<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ModelController extends Controller
{
    public function add(): Response
    {
        return Inertia::render('Model/Add');
    }
}
