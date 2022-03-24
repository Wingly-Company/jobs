<?php

namespace App\Http\Controllers;

use App\Http\Filters\Search;
use App\Http\Resources\AircraftResource;
use App\Models\Aircraft;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Inertia\Inertia;
use Inertia\Response;

class AircraftController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $aircraft = app(Pipeline::class)
            ->send(Aircraft::query())
            ->through(Search::class)
            ->thenReturn()
            ->get();

        return Inertia::render('Aircraft/Index', [
            'filters' => $request->all('search'),
            'aircraft' => AircraftResource::collection($aircraft),
        ]);
    }
}
