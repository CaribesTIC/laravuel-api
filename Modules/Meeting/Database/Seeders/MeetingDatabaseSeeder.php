<?php

namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Meeting\Entities\{Person, Meeting};

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

        Person::factory(10)->create();
        
        Meeting::factory(10)->create();

        // $this->call("OthersTableSeeder");
    }
}
