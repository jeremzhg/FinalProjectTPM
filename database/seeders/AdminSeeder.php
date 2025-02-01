<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('team_name', 'Admin Team')->exists()) {
            User::create([
                'team_name' => 'Admin Team',
                'password' => bcrypt('adminpassword'),
                'role' => 'admin',
                'leader_name' => 'Admin',
                'leader_email' => 'admin@example.com',
                'leader_whatsapp' => '1234567890',
                'leader_line' => 'adminline',
                'leader_github' => 'adminhub',
                'leader_birth_place' => 'Admin City',
                'leader_birth_date' => '2000-01-01',
                'leader_cv' => 'cv_file.pdf',
                'status' => 1, 
                'leader_card' => 'id_card.pdf',
            ]);
        }
    }
}
