<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupRole;


class GroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupRole::truncate();
        for($i = 1; $i <= 49; $i++){
            $item = new GroupRole();
            $item->role_id= $i;
            $item->group_id = 1;
            $item->save();
        }
    }
}
