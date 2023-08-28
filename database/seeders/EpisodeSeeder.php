<?php
// database/seeders/EpisodeSeeder.php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Character; // Asegúrate de importar el modelo Character
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder

{
    public function run()
    {
        $client = new Client([
            'verify' => false,
        ]);

        $page = 1;
        $allLocations = [];

        do {
            $response = $client->get('https://rickandmortyapi.com/api/episode?page=' . $page);
            $data = json_decode($response->getBody(), true);

            $locationsOnPage = $data['results'];
            $allLocations = array_merge($allLocations, $locationsOnPage);

            $page++;

            if (empty($data['info']['next'])) {
                break;
            }
        } while (true);

        foreach ($allLocations as $locationData) {
            $characterIds = $this->extractIdsFromUrls($locationData['characters']);

            Episode::create([
                'name' => $locationData['name'],
                'air_date' => $locationData['air_date'],
                'episode' => $locationData['episode'],
                'characters_id' => $characterIds,
                'url' => $locationData['url'],
            ]);
        }
    }

    private function extractIdsFromUrls($urls)
    {
        $ids = [];
        foreach ($urls as $url) {
            preg_match('/\d+$/', $url, $matches);
            if (!empty($matches)) {
                $ids[] = $matches[0];
            }
        }
        return implode(',', $ids);
    }
}
