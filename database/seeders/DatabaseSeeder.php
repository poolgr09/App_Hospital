<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Seeder para roles y permisos /admin-secretaria-pacientes-doctores
        $admin = Role::create(['name'=>'admin']);
        $secretaria = Role::create(['name'=>'secretaria']);
        $medico = Role::create(['name'=>'medico']);
        $paciente = Role::create(['name'=>'paciente']);


        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make(value:'12345678')
        ])->assignRole('admin');

        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make(value:'12345678')
        ])->assignRole('secretaria');

        User::create([
            'name'=>'Doctor',
            'email'=>'doctor@admin.com',
            'password'=>Hash::make(value:'12345678')
        ])->assignRole('medico');

        User::create([
            'name'=>'Paciente',
            'email'=>'paciente@admin.com',
            'password'=>Hash::make(value:'12345678')
        ])->assignRole('paciente');


        Permission::create(['name'=> 'admin.index']);
        

        //rutas admin usuarios
        Permission::create(['name'=> 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.usuarios.destroy'])->syncRoles([$admin]); 

         //rutas admin secretarias
        Permission::create(['name'=> 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.update'])->syncRoles([$admin]);
        Permission::create(['name'=> 'admin.secretarias.confirmDelete'])->syncRoles([$admin]); 
        Permission::create(['name'=> 'admin.secretarias.destroy'])->syncRoles([$admin]);

         //rutas admin medicos
         Permission::create(['name'=> 'admin.medicos.index'])->syncRoles([$admin, $paciente]);
         Permission::create(['name'=> 'admin.medicos.create'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.medicos.store'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.medicos.show'])->syncRoles([$admin, $paciente]);
         Permission::create(['name'=> 'admin.medicos.edit'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.medicos.update'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.medicos.confirmDelete'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.medicos.destroy'])->syncRoles([$admin]);
         Permission::create(['name'=> 'admin.vercitas'])->syncRoles([$admin,$medico]);
         

         //rutas admin pacientes
         Permission::create(['name'=> 'admin.pacientes.index'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.create'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.store']);
        //  ->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.show'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.edit'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.update'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.confirmDelete'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.pacientes.destroy'])->syncRoles([$admin,$secretaria]);


         //rutas admin usuariosespecialidades
         Permission::create(['name'=> 'admin.especialidades.index'])->syncRoles([$admin,$secretaria, $paciente]);
         Permission::create(['name'=> 'admin.especialidades.create'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.especialidades.store'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.especialidades.show'])->syncRoles([$admin,$secretaria, $paciente]);
         Permission::create(['name'=> 'admin.especialidades.edit'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.especialidades.update'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.especialidades.confirmDelete'])->syncRoles([$admin,$secretaria]);
         Permission::create(['name'=> 'admin.especialidades.destroy'])->syncRoles([$admin,$secretaria]);

         //rutas admin horarios
        Permission::create(['name'=> 'admin.horarios.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.horarios.destroy'])->syncRoles([$admin,$secretaria]);

        //rutas admin consultorios
        Permission::create(['name'=> 'admin.consultorios.index'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.create'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.store'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.show'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.edit'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.update'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.confirmDelete'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.destroy'])->syncRoles([$admin,$secretaria]);

        Permission::create(['name'=> 'admin.consultorios.asignar'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.guardarAsignacion'])->syncRoles([$admin,$secretaria]);
        Permission::create(['name'=> 'admin.consultorios.reporte'])->syncRoles([$admin,$secretaria]);

    }
}
