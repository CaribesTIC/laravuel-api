<?php

namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class PositionSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::connection('pgsql_meeting')->table('positions')->truncate();     
        
        \DB::connection('pgsql_meeting')->unprepared(
            "INSERT INTO public.positions (name, created_at, updated_at) VALUES ('Boss', NULL, NULL);
            INSERT INTO public.positions (name, created_at, updated_at) VALUES ('Director', NULL, NULL);
            INSERT INTO public.positions (name, created_at, updated_at) VALUES ('Leader', NULL, NULL);
            INSERT INTO public.positions (name, created_at, updated_at) VALUES ('Manager', NULL, NULL);"
        );
        
    }
}
