<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OriginSeeder;
use Database\Seeders\EpisodeSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\CharacterSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CharacterSeeder::class,
            EpisodeSeeder::class,
            OriginSeeder::class,
            LocationSeeder::class,
        ]);
    }
}
