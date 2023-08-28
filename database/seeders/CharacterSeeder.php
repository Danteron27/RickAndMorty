<?php

namespace Database\Seeders;

use App\Models\Character;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $client = new Client([
            'verify' => false,
        ]);

        $page = 1;
        $allCharacters = [];

        do {
            $response = $client->get('https://rickandmortyapi.com/api/character?page=' . $page);
            $data = json_decode($response->getBody(), true);

            $charactersOnPage = $data['results'];
            $allCharacters = array_merge($allCharacters, $charactersOnPage);

            $page++;

            if (empty($data['info']['next'])) {
                break;
            }
        } while (true);

        foreach ($allCharacters as $characterData) {
            $originId = $this->extractIdFromUrl($characterData['origin']['url']);
            $locationId = $this->extractIdFromUrl($characterData['location']['url']);

            $character = Character::create([
                'name' => $characterData['name'],
                'status' => $characterData['status'],
                'species' => $characterData['species'],
                'type' => $characterData['type'],
                'gender' => $characterData['gender'],
                'image' => $characterData['image'],
                'origin_id' => $originId,
                'location_id' => $locationId,
                'url' => $characterData['url'],
            ]);


            $id = $this->extractIdFromUrl($characterData['url']);
            $localUrl = url("http://localhost:8000/api/Characters/GetAnCharacter/{$id}");
            $character->url = $localUrl;
            $character->save();
        }
    }

    private function extractIdFromUrl($url)
    {
        preg_match('/\d+$/', $url, $matches);
        return !empty($matches) ? $matches[0] : null;
    }
}
