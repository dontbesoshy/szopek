<?php

namespace Tests\Feature;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Tests\TestCase;

class TaskNineTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);

        $this->user = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::USER->value);
        })->first();

        $this->admin = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::ADMIN->value);
        })->first();
    }

    public function testUserHasAccessToUserPage(): void
    {
        $this->assertTrue($this->user->hasRole(RoleEnum::USER->value));

        $response = $this->actingAs($this->user)->get(route('page.user'));
        $response->assertOk();
        $response->assertViewIs('pages.user');
    }

    public function testUserHasAccessToAdminPage(): void
    {
        $this->assertTrue($this->user->hasRole(RoleEnum::ADMIN->value));

        $response = $this->actingAs($this->admin)->get(route('page.admin'));
        $response->assertOk();
        $response->assertViewIs('pages.admin');
    }
}
