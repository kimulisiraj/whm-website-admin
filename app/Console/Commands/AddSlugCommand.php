<?php

namespace App\Console\Commands;

use App\Models\Location;
use App\Models\Testimony;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AddSlugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Location::all()->each(function ($location) {
            $location->update([
                'slug' => Str::slug($location->location_name)
            ]);
        });
        Testimony::all()->each(function ($location) {
            $location->update([
                'slug' => Str::slug($location->location_name)
            ]);
        });
        return Command::SUCCESS;
    }
}
