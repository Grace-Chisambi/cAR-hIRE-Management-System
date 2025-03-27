<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    public function run()
    {
        Users::create([
            'name' => 'Girey',
            'sname' => 'Chisambi',
            'email' => 'girey@example.com',
            'password' => bcrypt('simonana'),
        ]);
    }
}
