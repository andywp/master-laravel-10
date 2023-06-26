<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Admin::where('email','andy.wijang@gmail.com')->count()):
        Admin::create([
            'name'	=> 'Andi Wijang Prasetyo',
            'username' => 'andi',
            'email'	=> 'andy.wijang@gmail.com',
            'password'	=> bcrypt('andi//123'),
            'role'      => 'developer'
        ]);
        endif;
        if(!Admin::where('email','rasalogiweb@gmail.com')->count()):
        Admin::create([
            'name'	=> 'rasalogi',
            'username' => 'rasalogi',
            'email'	=> 'rasalogiweb@gmail.com',
            'password'	=> bcrypt('hallorasalogi123')
        ]); 
        endif;
    }
}
