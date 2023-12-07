<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chapter;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chapter = new Chapter();
        $chapter->name = 'Giới thiệu về JavaScript';
        $chapter->course_id = 1;
        $chapter->save();
        $chapter->name = 'Giới thiệu về PHP';
        $chapter->course_id = 1;
        $chapter->save();
        $chapter->name = 'Tìm hiểu về ngành IT';
        $chapter->course_id = 1;
       $chapter->save();
    }
}
