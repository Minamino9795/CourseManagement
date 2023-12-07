<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lession;

class LessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lession = new Lession();
        $lession->name = 'Lời khuyên trước khóa học';
        $lession->type = 'Miễn phí';
        $lession->content = 'Những lời khuyên trước khi bắt đầu khóa';
        $lession->image_url = 'anh1.jpg';
        $lession->video_url = 'https://bit.ly/4181Pz0';
        $lession->duration = 4;
        $lession->save();

        $lession = new Lession();
        $lession->name = 'Cài đặt môi trường';
        $lession->type = 'Miễn phí';
        $lession->content = 'Cài đặt các môi trường liên quan để thuận tiện cho việc học JS';
        $lession->image_url = 'anh2.jpg';
        $lession->video_url = 'https://fullstack.edu.vn/learning/javascript-co-ban?id=94d79256-7250-40e9-b863-f28ea2c59737';
        $lession->duration = 2;
        $lession->save();

        $lession = new Lession();

        $lession->name = 'Biến, kiểu dữ liệu và toán tử';
        $lession->type = 'Miễn phí';
        $lession->content = 'Biến và khai báo biến, các kiểu dữ liệu,toán tử, cấu trúc điều khiển';
        $lession->image_url = 'anh3.jpg';
        $lession->video_url = 'https://www.youtube.com/watch?v=baUJx1i1h5k';
        $lession->duration = 94;
        $lession->save();
    }
}