<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // CREATE PERMISSIONS
        Permission::create(['name' => 'manage hotels']);
        Permission::create(['name' => 'manage room types']);
        Permission::create(['name' => 'manage rooms']);
        Permission::create(['name' => 'update room status']);
        Permission::create(['name' => 'manage bookings']);
        Permission::create(['name' => 'manage guests']);
        Permission::create(['name' => 'perform check-in']);
        Permission::create(['name' => 'perform check-out']);
        Permission::create(['name' => 'manage finances']);
        Permission::create(['name' => 'manage invoices']);
        Permission::create(['name' => 'manage payments']);
        Permission::create(['name' => 'view financial reports']);
        Permission::create(['name' => 'manage staff']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'view activity logs']);
        Permission::create(['name' => 'manage housekeeping']);
        Permission::create(['name' => 'manage maintenance']);
        Permission::create(['name' => 'manage service requests']);
        Permission::create(['name' => 'view own bookings']);
        Permission::create(['name' => 'request services']);

        // CREATE ROLES & ASSIGN PERMISSIONS
        $ownerRole = Role::create(['name' => 'Hotel Owner']);
        $ownerRole->givePermissionTo(Permission::all());

        $financeRole = Role::create(['name' => 'Finance']);
        $financeRole->givePermissionTo([
            'manage finances',
            'manage invoices',
            'manage payments',
            'view financial reports',
            'view activity logs',
        ]);

        $receptionistRole = Role::create(['name' => 'Receptionist']);
        $receptionistRole->givePermissionTo([
            'manage bookings',
            'manage guests',
            'perform check-in',
            'perform check-out',
            'update room status',
            'manage invoices',
            'manage payments',
        ]);

        $maintenanceRole = Role::create(['name' => 'Maintenance']);
        $maintenanceRole->givePermissionTo([
            'manage maintenance',
            'update room status',
        ]);

        $housekeepingRole = Role::create(['name' => 'Housekeeping']);
        $housekeepingRole->givePermissionTo([
            'manage housekeeping',
            'update room status',
        ]);

        $restaurantRole = Role::create(['name' => 'Restaurant Staff']);
        $restaurantRole->givePermissionTo([
            'manage service requests',
        ]);

        $guestRole = Role::create(['name' => 'Guest']);
        $guestRole->givePermissionTo([
            'view own bookings',
            'request services',
            'manage payments',
        ]);
    }
}
