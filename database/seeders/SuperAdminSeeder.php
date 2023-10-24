<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cpermissions = [
            'admin:create',
            'admin:read',
            'admin:update',
            'admin:delete',

            //soporte permissions
            'soporte:create',
            'soporte:read',
            'soporte:update',
            'soporte:delete',
        ];

        foreach ($cpermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $user = User::create([
            'first_names' => 'Valeria',
            'last_names' => 'Valdivia',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => UserRole::ADMIN,
        ]);

        $roles = [
            UserRole::ADMIN,
            UserRole::SOPORTE
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $adminRole = Role::where('name', 'Administrador')->first();
        $permission = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permission);

        $user->assignRole([$adminRole->id]);
    }
}
