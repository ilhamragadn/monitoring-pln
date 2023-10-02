<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataItem = [
            ['name' => 'admin danu',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345')]
        ];
        DB::table('users')->insert($dataItem);
    }
}
