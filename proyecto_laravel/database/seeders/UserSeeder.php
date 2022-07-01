<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $mod = Role::create(['name' => 'moderator']);
        Role::create(['name' => 'client']);
        $perm_delete = Permission::create(['name' => 'delete']);
        $perm_view = Permission::create(['name' => 'view']);

        $admin->givePermissionTo($perm_delete);
        $admin->givePermissionTo($perm_view);
        $mod->givePermissionTo($perm_view);

        User::create([
            'username' => 'AgusM',
            'email' => 'agus91997@gmail.com',
            'password' => bcrypt('agusm'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ])->assignRole('admin');

        User::create([
            'username' => 'admin.test',
            'email' => 'admin_test@test.com',
            'password' => bcrypt('AdminTest99'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ])->assignRole('admin');

        User::create([
            'username' => 'mod.test',
            'email' => 'mod_test@test.com',
            'password' => bcrypt('ModTest99'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ])->assignRole('moderator');

        User::create([
            'username' => 'usuario.test',
            'email' => 'usuario_test@test.com',
            'password' => bcrypt('UsuarioTest99'),
            'picture' => base64_encode(
                file_get_contents("https://picsum.photos/" . random_int(100, 200) . "/" . random_int(100, 200))
            ),
            'email_verified_at' => now(),
        ])->assignRole('client');

        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->assignRole('client');
        }
    }
}
