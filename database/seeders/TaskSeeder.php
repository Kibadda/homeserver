<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Listing::all()->each(function (Listing $listing) {
            /** @var Collection $labels */
            $labels = $listing->board->labels()->get();

            Task::factory()
                ->count(5)
                ->label($labels)
                ->for($listing)
                ->create();
        });
    }
}
