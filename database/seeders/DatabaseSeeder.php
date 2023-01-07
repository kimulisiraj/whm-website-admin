<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Banner;
use App\Models\ChurchEvent;
use App\Models\Location;
use App\Models\LocationActivity;
use App\Models\Sermon;
use App\Models\Testimony;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Location::factory()
            ->has(LocationActivity::factory()->count(2), 'activities')
            ->count(10)
            ->create();

        ChurchEvent::factory()->count(10)->create();
        Banner::factory()->count(3)->create();
        Sermon::factory()->count(3)->create();
        Testimony::factory()->count(100)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
    }
}
