<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Roleuser;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 5)->create();

        App\User::create([
            'id' => '1',
            'statu'=>'Activo',
            'user'=>'desiderio',
            'password'=>bcrypt('desiderio')
        ]);

        Role::create([
            'id' => '1',
        	'name'	 	=> 'Admin',
        	'slug'		=> 'admin',
        	'special' 	=> 'all-access'
        ]);
//para esta tabla se añadio el modelo Roleuser
        Roleuser::create([
            'role_id'      => '1',
            'user_id'      => '1',
        ]);
    }
}
