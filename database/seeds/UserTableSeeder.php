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
        $role_paciente = Role::where('name', 'Paciente')->first();
        $role_medico = Role::where('name', 'Medico')->first();
        $role_enfermera = Role::where('name', 'Enfermera')->first();
        
        $user = new User();
        $user->name = 'Alejandro';
        $user->username = 'jaholguina';
        $user->email = 'jaholguina@unal.edu.co';
        $user->password = bcrypt('holi123456');
        $user->save();
        $user->roles()->attach($role_paciente);

        $user = new User();
        $user->name = 'Alejandro2';
        $user->username = 'jaholguina2';
        $user->email = 'jaholguina2@unal.edu.co';
        $user->password = bcrypt('holi123456');
        $user->save();
        $user->roles()->attach($role_medico);
    }
}
