<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\MigrateFreshSeedOnce;
use Tests\TestCase;

class EmployeesCrudTest extends TestCase
{
    // @TODO: MigrateFreshSeedOnce is not great for larger DBs as will slow seeding hugely - replace with a less time consuming process
    use RefreshDatabase, MigrateFreshSeedOnce;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testListEmployees()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('employees.index'));

        $response->assertStatus(200);
        $response->assertSee('Welcome to the employees admin panel.');
        $response->assertViewHas('employees');
    }

    /**
     * Test Create Employee
     *
     * @return void
     */
    public function testCreateEmployee()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('employees.create'), []);

        $response->assertStatus(200);
        $response->assertSee('Create new employee.');
        $response->assertSee('first_name');
        $response->assertSee('last_name');
        $response->assertSee('phone');
        $response->assertSee('email');
        $response->assertSee('compnay_id');

    }

    /**
     * Test Store Employee
     *
     * @return void
     */
    public function testStoreEmployeeSuccess()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this
            ->from(route('employees.create'))
            ->followingRedirects()
            ->post(route('employees.store'), [
                'first_name' => 'Richard',
                'last_name' => 'Skinner',
                'email' => 'ricvhard.skinner@gunpowderdigital.com',
                'phone' => '07766415880',
                'company_id' => 1
            ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', [
            'first_name' => 'Richard',
            'last_name' => 'Skinner',
            'company_id' => 1
        ]);
        $response->assertSee('Employee Richard Skinner Added Successfully.');
    }

    /**
     * Test Store Employee Failure
     *
     * @return void
     */
    public function testStoreEmployeeFailure()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this
            ->from(route('employees.create'))
            ->post(route('employees.store'), [
                'first_name' => '12345',
                'last_name' => '6789',
                'email' => 'richard.skinner',
                'phone' => 'ABCDE',
                'company_id' => 1
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
        $response->assertSessionHasErrors('first_name', 'The first name field is required.');
        $response->assertSessionHasErrors('last_name', 'The last name field is required.');
        $response->assertSessionHasErrors('email', 'The email must be a valid email address.');
        $response->assertSessionHasErrors('phone', 'The phone is not a valid UK phone number.');
    }

    /**
     * Test Edit Employee
     *
     * @return void
     */
    public function testEditEmployee()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('employees.edit', ['employee' => 1]));
        $response->assertStatus(200);
        $response->assertSee('Edit existing employee.');
        $response->assertViewHas('employee');
    }

    /**
     * Test Update Employee
     *
     * @return @void
     */
    public function testUpdateEmployeeSuccess()
    {
        $user = User::find(1);
        $this->actingAs($user);


        $response = $this
            ->from(route('employees.edit', ['employee' => 1]))
            ->followingRedirects()
            ->put(
                route('employees.update', ['employee' => 1]),
                [
                    'first_name' => 'Lewis',
                    'last_name' => 'Skinner',
                    'email' => 'lewis.skinner@gunpowderdigital.com',
                    'phone' => '07766415881',
                    'company_id' => 1
                ]
            );

        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', [
            'first_name' => 'Lewis',
            'last_name' => 'Skinner',
            'email' => 'lewis.skinner@gunpowderdigital.com',
            'company_id' => 1
        ]);
        $response->assertSee('Employee Lewis Skinner Updated Successfully.');
    }

    /**
     * Test Update Employee Failure
     *
     * @return void
     */
    public function testUpdateEmployeeFailure()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this
            ->from(route('employees.create'))
            ->post(route('employees.store'), [
                'first_name' => '12345',
                'last_name' => '6789',
                'email' => 'richard.skinner',
                'phone' => 'ABCDE',
                'company_id' => 1
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors();
        $response->assertSessionHasErrors('first_name', 'The first name field is required.');
        $response->assertSessionHasErrors('last_name', 'The last name field is required.');
        $response->assertSessionHasErrors('email', 'The email must be a valid email address.');
        $response->assertSessionHasErrors('phone', 'The phone is not a valid UK phone number.');
    }
}
