<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        $p1 = new Permiso();
        $p1->nombre = "listar_user";
        $p1->save();

        $p2 = new Permiso();
        $p2->nombre = "guardar_user";
        $p2->save();

        $r1 = new Role();
        $r1->nombre = "admin";
        $r1->save();

        $r2 = new Role();
        $r2->nombre = "cajero";
        $r2->save();


        $r1->permisos()->attach([$p1->id, $p2->id]);
        $r2->permisos()->attach([$p1->id]);


        $u1 = User::find(2);
        $u1->assignRole($r1);

        $u2 = User::find(1);
        $u2->assignRole($r2);
    }
}
