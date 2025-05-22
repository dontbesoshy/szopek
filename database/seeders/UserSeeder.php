<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(2)->create();

        $userRole = Role::where('name', RoleEnum::USER->value)->first();
        $adminRole = Role::where('name', RoleEnum::ADMIN->value)->first();

        $users[1]->roles()->attach($userRole);
        $users[0]->roles()->attach($adminRole);
    }
}
