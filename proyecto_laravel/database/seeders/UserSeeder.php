<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'AgusM',
            'email' => 'agus91997@gmail.com',
            'password' => bcrypt('agusm'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'DiegoCM',
            'email' => 'dcm@cs.uns.edu.ar',
            'password' => bcrypt('dcm'),
            'email_verified_at' => now(),
        ]);
    }
}
