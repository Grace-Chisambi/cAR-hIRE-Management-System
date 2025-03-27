<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ensure this line is present

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Girey',
            'sname' => 'Chisambi',
            'email' => 'girey@example.com',
            'password' => bcrypt('simonana'),
        ]);
    }
}
