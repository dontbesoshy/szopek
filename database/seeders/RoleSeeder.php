<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => RoleEnum::ADMIN->value,
            'slug' => RoleEnum::ADMIN->value,
        ]);

        Role::factory()->create([
            'name' => RoleEnum::USER->value,
            'slug' => RoleEnum::USER->value,
        ]);
    }
}
