<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        
        // Crear los roles
        $Rolsuperadmin = Role::create(['name' => 'superadmin']);
        $Rolinstitucional = Role::create(['name' => 'tecnologia']);
        $Rolinstitucional = Role::create(['name' => 'institucional']);
        $Rolprivado =  Role::create(['name' => 'privado']);
        $Roldirectivo =  Role::create(['name' => 'directivo']);

        Permission::create(['name' => 'ver:role']);
        Permission::create(['name' => 'crear:role']);
        Permission::create(['name' => 'editar:role']);
        Permission::create(['name' => 'eliminar:role']);

        Permission::create(['name' => 'ver:permiso']);

        Permission::create(['name' => 'ver:usuario']);
        Permission::create(['name' => 'crear:usuario']);
        Permission::create(['name' => 'editar:usuario']);
        Permission::create(['name' => 'eliminar:usuario']);

        /*CREACION DE USUARIO*/
        
        $user = new User;
        $user-> name = 'PruebaRolADMIN';
        $user-> email = 'Prueba@gmail.com';
        $user-> password = bcrypt('12345678');
        $user->  save() ;
        $user->assignRole($Rolsuperadmin);

    }
}
