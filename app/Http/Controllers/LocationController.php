<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use App\Models\Location;
use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Requests\Location\CreateLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;

class LocationController extends Controller
{
    public function showAllLocations()
    {
        $locations = $this->getAllLocations()->original['locations'];
        return view('locations.index', compact('locations'));
    }
    public function showCreateLocation(Location $location)
{
    $characters = Character::pluck('name', 'id');
    return view('locations.create', compact('location', 'characters'));
}




    public function showEditLocation(Location $location)
    {
        $locations = Location::pluck('name', 'id');
        $origins = Origin::pluck('name', 'id');
        return view('locations.edit', compact('locations', 'origins', 'location'));
    }

    public function getAllLocations()
    {
        $locations = Location::with('residents')->get();

        $formattedLocations = $locations->map(function ($location) {
            return [
                'id' => $location->id,
                'name' => $location->name,
                'type' => $location->type,
                'dimension' => $location->dimension,
                'residents' => $location->residents->pluck('name')->toArray(),
                'url' => $location->url,
            ];
        });

        return response()->json(['locations' => $formattedLocations], 200);
    }


    public function getAnLocation(Location $location)
    {
        $location->load('origin', 'location');

        return response()->json([
            'location' => [
                'name' => $location->name,
                'location' => $location->location ? $location->location->name : null,
                'origin' => $location->origin ? $location->origin->name : 'unknown',
                'status' => $location->status,
                'species' => $location->species,
                'type' => $location->type,
                'gender' => $location->gender,
                'image' => $location->image,
                'url' => $location->url,
            ]
        ], 200);
    }

    public function createLocation(CreateLocationRequest $request)
    {
        $location = new Location($request->all());
        $location->save();
        $location->url = url('api/Locations/GetAnLocation/' . $location->id);
        $location->save();

        $locations = Location::all();
        if ($request->ajax()) return response()->json(['location' => $location], 201);
        return back()->with('success', 'Location Creado Exitosamente');
    }

    public function updateLocation(Location $location, UpdateLocationRequest $request)
    {
        $location->update($request->all());
        if ($request->ajax()) return response()->json(['location' => $location->refresh()], 201);
        return back()->with('success', 'Location Actualizado Exitosamente');
    }
    public function deleteLocation(Location $location, Request $request)
    {
        $location->delete();
        if ($request->ajax()) response()->json([], 204);
        return back()->with('success', 'Location Eliminado');
    }
}
