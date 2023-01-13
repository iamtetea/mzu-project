<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User();
        $data->name = 'Admin';
        $data->email = 'admin@booking.com';
        $data->phone_number = 9999999999;
        $data->role = 'admin';
        $data->password = Hash::make('admin2023');
        $data->save();
    }
}
