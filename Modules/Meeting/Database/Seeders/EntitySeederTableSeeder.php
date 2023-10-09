<?php

namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class EntitySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::connection('pgsql_meeting')->table('entities')->truncate();     
        
        \DB::connection('pgsql_meeting')->unprepared(
            "INSERT INTO public.entities (name, created_at, updated_at) VALUES ('Company A', NULL, NULL);
            INSERT INTO public.entities (name, created_at, updated_at) VALUES ('Company B', NULL, NULL);
            INSERT INTO public.entities (name, created_at, updated_at) VALUES ('Company C', NULL, NULL);
            INSERT INTO public.entities (name, created_at, updated_at) VALUES ('Company D', NULL, NULL);"
        );
        
    }
}
