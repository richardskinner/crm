<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Company::class, 15)->create()->each(function ($company) {
            factory(\App\Employee::class, 50)->create(['company_id' => $company->id]);
        });
    }
}
