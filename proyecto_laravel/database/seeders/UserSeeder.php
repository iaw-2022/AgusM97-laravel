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
            'username' => 'AgusM',
            'email' => 'agus91997@gmail.com',
            'password' => bcrypt('agusm'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ]);

        User::create([
            'username' => 'DiegoCM',
            'email' => 'dcm@cs.uns.edu.ar',
            'password' => bcrypt('dcm'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ]);

        $enc_data = 
        User::create([
            'username' => 'usuario.test',
            'email' => 'usuario_test@test.com',
            'password' => bcrypt('UsuarioTest99'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ]);

        User::factory(12)->create();
    }
}
