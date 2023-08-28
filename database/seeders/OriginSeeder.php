<?php

namespace Database\Seeders;

use App\Models\Origin;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    public function run()
    {
        $client = new Client([
            'verify' => false,
        ]);

        $page = 1;
        $allOrigins = [];

        do {
            $response = $client->get('https://rickandmortyapi.com/api/location?page=' . $page);
            $data = json_decode($response->getBody(), true);

            $originsOnPage = $data['results'];
            $allOrigins = array_merge($allOrigins, $originsOnPage);

            $page++;

            if (empty($data['info']['next'])) {
                break;
            }
        } while (true);

        foreach ($allOrigins as $originData) {
            Origin::create([
                'name' => $originData['name'],
                'type' => $originData['type'],
                'dimension' => $originData['dimension'],
                'url' => $originData['url'],
            ]);
        }
    }
}