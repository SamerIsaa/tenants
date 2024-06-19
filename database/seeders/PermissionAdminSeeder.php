<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class PermissionAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard_name = 'admin';

        $dataRoles = [
            [
                'name' => 'Super Admin',
                'guard_name' => $guard_name,
            ],
        ];

        $data = [
            ['name' => 'manage_roles', 'guard_name' => $guard_name,],
            ['name' => 'add_admins', 'guard_name' => $guard_name,],
            ['name' => 'show_admins', 'guard_name' => $guard_name,],
            ['name' => 'manage_faq', 'guard_name' => $guard_name,],
            ['name' => 'manage_pages', 'guard_name' => $guard_name,],
            ['name' => 'manage_settings', 'guard_name' => $guard_name,],
            ['name' => 'manage_inbox', 'guard_name' => $guard_name,],
            ['name' => 'manage_blogs', 'guard_name' => $guard_name,],
        ];

        $admin = Admin::query()->updateOrCreate([
            'email' => 'admin@admin.com'
        ], [
            'name' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make(123456789)
        ]);
        foreach ($dataRoles as $item) {
            $role = Role::updateOrCreate(['name' => $item['name']], $item);
        }
        $admin->syncRoles([$role['id']]);

        foreach ($data as $item) {
            $permission = Permission::updateOrCreate(['name' => $item['name']], $item);
            $role->givePermissionTo($permission);
        }

    }
}
