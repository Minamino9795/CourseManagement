<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Quản Trị Viên';
        $user->email = 'admin@gmail.com';
        $user->address = 'Đông Hà';
        $user->phone = '0123456789';
        $user->image = '';
        $user->gender = 'Nam';
        $user->birthday = '1996-09-15';
        $user->password = Hash::make('123456');
        $user->group_id = 2;
        $user->status = 1;
        $user->save();
    }
}
