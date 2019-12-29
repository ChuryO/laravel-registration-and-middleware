<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
//        TODO
        $adminRole = Role::where('name', 'admin')->first();
        $clientRole = Role::where('name', 'registered')->first();
        $managerRole = Role::where('name', 'active')->first();
        $employeeRole = Role::where('name', 'employee')->first();


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.pl',
            'password' => Hash::make('password')
        ]);

        $client = User::create([
            'name' => 'Registered',
            'email' => 'registered@example.pl',
            'password' => Hash::make('password')
        ]);

        $managerUser = User::create([
            'name' => 'Manager - Active',
            'email' => 'manager@example.pl',
            'password' => Hash::make('password')
        ]);
//
        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@example.pl',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
        $managerUser->roles()->attach($managerRole);
        $employee->roles()->attach($employeeRole);

    }
}
