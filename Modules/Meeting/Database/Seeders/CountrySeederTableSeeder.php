<?php

namespace Modules\Meeting\Database\Seeders;

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

        \DB::connection('pgsql_meeting')->table('countries')->truncate();     
        
        \DB::connection('pgsql_meeting')->unprepared(
            "INSERT INTO public.countries (name, created_at, updated_at) VALUES ('Venezuela', NULL, NULL);
            INSERT INTO public.countries (name, created_at, updated_at) VALUES ('Colombia', NULL, NULL);
            INSERT INTO public.countries (name, created_at, updated_at) VALUES ('Perú', NULL, NULL);
            INSERT INTO public.countries (name, created_at, updated_at) VALUES ('Ecuador', NULL, NULL);"
        );
        
    }
}
