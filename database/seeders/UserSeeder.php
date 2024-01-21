<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $admin = Role::create(['name' => 'admin']);

        //creating a admin user
        $AdminUser = new User;
        $AdminUser->name = 'Admin';
        $AdminUser->email = 'admin@gmail.com';
        $AdminUser->status = 1;
        $AdminUser->password =  Hash::make('123');
        $AdminUser->save();
        $AdminUser->assignRole($admin);

        // $student = Role::create(['name' => 'student']);

        // //creating a student user
        // $StudentUser = new User;
        // $StudentUser->name = 'Alex';
        // $StudentUser->email = 'alex@gmail.com';
        // $StudentUser->status = 1;
        // $StudentUser->password =  Hash::make('123');
        // $StudentUser->save();
        // $StudentUser->assignRole($student);

    }
}
