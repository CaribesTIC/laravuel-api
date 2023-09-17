<?php

namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Meeting\Entities\{Approach, Person, Meeting};

class MeetingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call([CountrySeederTableSeeder::class]);
        $this->call([DependenceSeederTableSeeder::class]);
        $this->call([EntitySeederTableSeeder::class]);
        $this->call([PositionSeederTableSeeder::class]);

        Person::factory(10)->create();
    
        for ($x = 0; $x < 10; $x++) {
            Meeting::factory()
                ->hasAgreements(rand(1, 3))
                ->hasAttendes(rand(1, 3))
                ->hasApproaches(rand(1, 3))
                ->create();
        }
        
        /*Meeting::factory(10)
          ->hasAgreements(rand(1, 3))
          ->hasAttendes(rand(1, 3))
          ->hasApproaches(rand(1, 3))
          ->create();*/

        // $this->call("OthersTableSeeder");
    }
}


