<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Board::all()->each(fn(Board $board) => Label::factory()->count(10)->for($board)->create());
    }
}
