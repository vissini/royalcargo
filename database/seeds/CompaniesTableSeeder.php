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
        factory(\App\Model\Company::class,5)->states("fisico")->create();
        factory(\App\Model\Company::class,5)->states("juridico")->create()
        ->each(function ($company) {
            for ($i=0; $i < rand(1,2);$i++) { 
                $company->contacts()->save(factory(App\Model\Contact::class)->make())->
                    phones()->save(factory(App\Model\Phone::class)->make());    
            }
            
        });
    }
}
