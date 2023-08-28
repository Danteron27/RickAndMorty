<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Character;
use App\Models\Origin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Character\CreateCharacterRequest;
use App\Http\Requests\Character\UpdateCharacterRequest;

class CharacterController extends Controller
{
    private function fetchCharactersFromApi()
    {
        $client = Http::withoutVerifying()->retry(3, 1000)->withOptions(['delay' => 1000]);
        $page = 1;
        $allCharacters = [];

        do {
            $response = $client->get('https://rickandmortyapi.com/api/character?page=' . $page);

            if ($response->successful()) {
                $data = $response->json();
                $charactersOnPage = $data['results'];
                $allCharacters = array_merge($allCharacters, $charactersOnPage);
            } else {
                sleep(10);
            }

            $page++;
        } while (!empty($data['info']['next']));

        return $allCharacters;
    }

    public function showAllCharacters()
    {
        $characters = $this->getAllCharacters()->original['characters'];
        return view('characters.index', compact('characters'));
    }
    public function showCreateCharacter(Character $character)
    {
        $locations = Location::pluck('name', 'id');
        $origins = Origin::pluck('name', 'id');
        return view('characters.create', compact('locations', 'origins', 'character'));
    }

    public function showHomeWithCharacters()
    {
        $characters = $this->getAllCharacters()->original['characters'];
        return view('index', compact('characters'));
    }

    public function showEditCharacter(Character $character)
    {
        $locations = Location::pluck('name', 'id');
        $origins = Origin::pluck('name', 'id');
        return view('characters.edit', compact('locations', 'origins', 'character'));
    }

    public function getAllCharacters()
    {
        $characters = Character::with('location', 'origin')->get();

        $formattedCharacters = $characters->map(function ($character) {
            return [
                'id' => $character->id,
                'name' => $character->name,
                'location' => $character->location ? $character->location->name : null,
                'origin' => $character->origin ? $character->origin->name : 'unknown',
                'status' => $character->status,
                'species' => $character->species,
                'Type' => $character->Type,
                'gender' => $character->gender,
                'image' => $character->image,
                'url' => $character->url,
            ];
        });

        return response()->json(['characters' => $formattedCharacters], 200);
    }

    public function getAnCharacter(Character $character)
    {
        $character->load('origin', 'location');

        return response()->json([
            'character' => [
                'name' => $character->name,
                'location' => $character->location ? $character->location->name : null,
                'origin' => $character->origin ? $character->origin->name : 'unknown',
                'status' => $character->status,
                'species' => $character->species,
                'type' => $character->type,
                'gender' => $character->gender,
                'image' => $character->image,
                'url' => $character->url,
            ]
        ], 200);
    }

    public function createCharacter(CreateCharacterRequest $request)
    {
        $character = new Character($request->all());
        $character->save();
        $character->url = url('api/Characters/GetAnCharacter/' . $character->id);
        $character->save();

        $locations = Location::all();
        if ($request->ajax()) return response()->json(['character' => $character], 201);
        return back()->with('success', 'Character Creado Exitosamente');
 
    }

    public function updateCharacter(Character $character, UpdateCharacterRequest $request)
    {
        $character->update($request->all());
        if ($request->ajax()) return response()->json(['character' => $character->refresh()], 201);
        return back()->with('success', 'Character Actualizado Exitosamente');
    }
    public function deleteCharacter(Character $character, Request $request)
    {
        $character->delete();
        if ($request->ajax()) response()->json([], 204);
        return back()->with('success', 'Character Eliminado');
    }
}
