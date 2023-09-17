<?php

namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class DependenceSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::connection('pgsql_meeting')->table('dependencies')->truncate();     
        
        \DB::connection('pgsql_meeting')->unprepared(
            "INSERT INTO public.dependencies (id, name, created_at, updated_at) VALUES (1, 'Office A', NULL, NULL);
            INSERT INTO public.dependencies (id, name, created_at, updated_at) VALUES (2, 'Office B', NULL, NULL);
            INSERT INTO public.dependencies (id, name, created_at, updated_at) VALUES (3, 'Office C', NULL, NULL);
            INSERT INTO public.dependencies (id, name, created_at, updated_at) VALUES (4, 'Office D', NULL, NULL);"
        );
        
    }
}
