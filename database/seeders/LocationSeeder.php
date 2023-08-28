<?php

namespace Database\Seeders;

use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $client = new Client([
            'verify' => false,
        ]);

        $page = 1;
        $allLocations = [];

        do {
            $response = $client->get('https://rickandmortyapi.com/api/location?page=' . $page);
            $data = json_decode($response->getBody(), true);

            $locationsOnPage = $data['results'];
            $allLocations = array_merge($allLocations, $locationsOnPage);

            $page++;

            if (empty($data['info']['next'])) {
                break;
            }
        } while (true);

        foreach ($allLocations as $locationData) {
            $residentsIds = $this->extractIdsFromUrls($locationData['residents']);

            Location::create([
                'name' => $locationData['name'],
                'type' => $locationData['type'],
                'dimension' => $locationData['dimension'],
                'residents_ids' => $residentsIds,
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