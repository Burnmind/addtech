<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function main(): Response
    {
        return Inertia::render('Main', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
