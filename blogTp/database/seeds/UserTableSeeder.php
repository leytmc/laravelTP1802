<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_inconnu = Role::where('niveau', 'name', 'inconnu')->first();
        $role_connecte = Role::where('niveau', 'name', 'connecte')->first();
        $role_moderateur = Role::where('niveau', 'name', 'moderateur')->first();
        $role_admin = Role::where('niveau', 'name', 'admin')->first();

        $inconnu = new User();
        $inconnu->name = 'Nom User Inconnu';
        $inconnu->email = 'inconnu@example.fr';
        $inconnu->password = bcrypt('secret');
        $inconnu->save();
        $inconnu->roles()->attach($role_inconnu);

        $connecte = new Role();
        $connecte->name = 'Nom User Connecté';
        $connecte->email = 'connecte@example.fr';
        $inconnu->password = bcrypt('secret');
        $connecte->save();
        $connecte->roles()->attach($role_connecte);

        $moderateur = new Role();
        $moderateur->name = 'Nom Modérateur';
        $moderateur->email = 'moderateur@example.fr';
        $inconnu->password = bcrypt('secret');
        $moderateur->save();
        $moderateur->roles()->attach($role_moderateur);

        $admin = new Role();
        $admin->name = 'Nom Admin';
        $admin->email = 'admin@example.fr';
        $inconnu->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
