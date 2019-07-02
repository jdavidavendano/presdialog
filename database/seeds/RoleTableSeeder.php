<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Paciente';
        $role->description = 'El que pacienta';
        $role->save();

        $role = new Role();
        $role->name = 'Medico';
        $role->description = 'El que medica';
        $role->save();

        $role = new Role();
        $role->name = 'Enfermera';
        $role->description = 'La que enfermera';
        $role->save();
    }
}
