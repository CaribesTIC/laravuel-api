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
            "INSERT INTO public.dependencies (name, created_at, updated_at) VALUES ('Office A', NULL, NULL);
            INSERT INTO public.dependencies (name, created_at, updated_at) VALUES ('Office B', NULL, NULL);
            INSERT INTO public.dependencies (name, created_at, updated_at) VALUES ('Office C', NULL, NULL);
            INSERT INTO public.dependencies (name, created_at, updated_at) VALUES ('Office D', NULL, NULL);"
        );
        
    }
}
