<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class CountrySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::connection('pgsql_client')->table('countries')->delete();     
        
        \DB::connection('pgsql_client')->unprepared(
            "INSERT INTO public.countries (id, name, created_at, updated_at) VALUES (1, 'Venezuela', NULL, NULL);
            INSERT INTO public.countries (id, name, created_at, updated_at) VALUES (2, 'Colombia', NULL, NULL);
            INSERT INTO public.countries (id, name, created_at, updated_at) VALUES (3, 'Perú', NULL, NULL);
            INSERT INTO public.countries (id, name, created_at, updated_at) VALUES (4, 'Ecuador', NULL, NULL);"
        );
        
    }
}
