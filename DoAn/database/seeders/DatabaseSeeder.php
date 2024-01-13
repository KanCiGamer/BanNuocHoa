<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data =[
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345'),
        ];
        //DB::table('quan_tri_viens')->insert($data);
    }
}
