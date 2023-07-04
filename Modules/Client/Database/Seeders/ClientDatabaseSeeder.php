<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\Entities\Client;


class ClientDatabaseSeeder extends Seeder
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

        Client::factory(10)->create();

        // $this->call("OthersTableSeeder");
                // $this->call("OthersTableSeeder");

    }
}
