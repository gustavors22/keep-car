<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\VehicleCollection;

class ClientVehiclesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Client $client)
    {
        $this->authorize('view', $client);

        $search = $request->get('search', '');

        $vehicles = $client
            ->vehicles()
            ->search($search)
            ->latest()
            ->paginate();

        return new VehicleCollection($vehicles);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $this->authorize('create', Vehicle::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'identifier' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255', 'string'],
        ]);

        $vehicle = $client->vehicles()->create($validated);

        return new VehicleResource($vehicle);
    }
}
