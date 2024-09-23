<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Board::all()->each(fn(Board $board) => Listing::factory()->count(5)->for($board)->create());
    }
}
