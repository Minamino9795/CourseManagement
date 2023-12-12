<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = ['categories', 'chapters', 'courses', 'groups', 'lessions', 'levels', 'orders', 'users'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete'];

        foreach ($tables as $table) {
            foreach ($actions as $action) {
                $item = new Role();
                $item->name = $table . '_' . $action;
                $item->group_name = $table;
                $item->timestamps = false; // Vô hiệu hóa timestamps

                $item->save();
            }
        }
    }
}