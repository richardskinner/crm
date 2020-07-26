<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompaniesCrudTest extends TestCase
{
    /**
     * Test List Companies
     *
     * Testing we get a the page loaded correctly with companies listed
     *
     * @return void
     */
    public function testListCompany()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
