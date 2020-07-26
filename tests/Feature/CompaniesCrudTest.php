<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\MigrateFreshSeedOnce;
use Tests\TestCase;

class CompaniesCrudTest extends TestCase
{
    // @TODO: MigrateFreshSeedOnce is not great for larger DBs as will slow seeding hugely - replace with a less time consuming process
    use RefreshDatabase, MigrateFreshSeedOnce;

    /**
     * Test List Companies
     *
     * Testing we get a the page loaded correctly with companies listed
     *
     * @return void
     */
    public function testListCompanies()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('companies.index'));

        $response->assertStatus(200);
        $response->assertSee('Welcome to the companies admin panel.');
        $response->assertViewHas('companies');
    }

    /**
     * Test Create Company
     *
     * @return void
     */
    public function testCreateCompany()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('companies.create'), []);

        $response->assertStatus(200);
        $response->assertSee('Create new company.');
        $response->assertSee('name');
        $response->assertSee('logo');
        $response->assertSee('website');
        $response->assertSee('email');

    }

    /**
     * Test Store Company
     *
     * @return void
     */
    public function testStoreCompany()
    {
        $user = User::find(1);
        $this->actingAs($user);

        Storage::fake('local');

        $file = UploadedFile::fake()->image('image.jpg', 100, 100);

        $response = $this
            ->from(route('companies.create'))
            ->followingRedirects()
            ->post(route('companies.store'), [
                'name' => 'Gunpowder Digital Ltd',
                'logo' => $file,
                'email' => 'info@gunpowderdigital.com',
                'website' => 'www.gunpowderdigital.com'
            ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('companies', [
            'email' => 'info@gunpowderdigital.com'
        ]);
        $response->assertSee('Company Gunpowder Digital Ltd Added Successfully.');
    }

    /**
     * Test Edit Company
     *
     * @return void
     */
    public function testEditCompany()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $response = $this->get(route('companies.edit', ['company' => 1]));

        $response->assertStatus(200);
        $response->assertSee('Edit existing company.');
        $response->assertViewHas('company');
    }

    public function testUpdateCompany()
    {
        $user = User::find(1);
        $this->actingAs($user);

        Storage::fake('local');

        $file = UploadedFile::fake()->image('image.jpg', 100, 100);

        $response = $this
            ->from(route('companies.edit', ['company' => 1]))
            ->followingRedirects()
            ->put(
                route('companies.update', ['company' => 1]),
                [
                    'name' => 'Gunpowder Digital Ltd',
                    'logo' => $file,
                    'email' => 'info@gunpowderdigital.com',
                    'website' => 'www.gunpowderdigital.com'
                ]
            );

        $response->assertStatus(200);
        $this->assertDatabaseHas('companies', [
            'email' => 'info@gunpowderdigital.com'
        ]);
        $response->assertSee('Company Gunpowder Digital Ltd Updated Successfully.');
    }
}
