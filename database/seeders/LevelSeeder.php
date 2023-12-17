<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level = new Level();
        $level->name = 'Người mới bắt đầu';
        $level->level = 'Cơ bản';
        $level->status = 0;
        $level->save();

        $level = new Level();
        $level->name = 'Người mới bắt đầu';
        $level->level = 'Nâng cao';
        $level->status = 0;
        $level->save();
    }
}
