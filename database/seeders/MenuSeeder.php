<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
         Menu::create([ // id 1
            "title" => "Dashboard",
            "menu_id" => null,
            "path" => "dashboard",
            "icon" => "dashboard.svg",
            "sort" => 1
        ]);

        Menu::create([ // id 2
            "title" => "Registrar",
            "menu_id" => null,
            "path" => "#",
            "icon" => "",
            "sort" => 2
        ]);
        
        Menu::create([ // id 3
            "title" => "Message",
            "menu_id" => 2,
            "path" => "message",
            "icon" => "articles.svg",
            "sort" => 1
        ]);

        Menu::create([ // id 4
            "title" => "People",
            "menu_id" => 2,
            "path" => "people",
            "icon" => "categories.svg",
            "sort" => 2
        ]);

        Menu::create([ // id 5
            "title" => "Meetings",
            "menu_id" => 2,
            "path" => "meetings",
            "icon" => "mark.svg",
            "sort" => 3
        ]);
 
        Menu::create([ // id 6
            "title" => "Admin",
            "menu_id" => null,
            "path" => "#",
            "icon" => "",
            "sort" => 3
        ]);

        Menu::create([ // id 7
            "title" => "Roles",
            "menu_id" => 6,
            "path" => "roles",
            "icon" => "users.svg",
            "sort" => 1
        ]);

        Menu::create([ // id 8
            "title" => "Users",
            "menu_id" => 6,
            "path" => "users",
            "icon" => "user.svg",
            "sort" => 2
        ]);

        Menu::create([ // id 9
            "title" => "Countries",
            "menu_id" => 6,
            "path" => "countries",
            "icon" => "categories.svg",
            "sort" => 3
        ]); 

        Menu::create([ // id 10
            "title" => "Entities",
            "menu_id" => 6,
            "path" => "entities",
            "icon" => "categories.svg",
            "sort" => 3
        ]);
 
         Menu::create([ // id 11
            "title" => "Dependencies",
            "menu_id" => 6,
            "path" => "dependencies",
            "icon" => "categories.svg",
            "sort" => 3
        ]);
 
         Menu::create([ // id 13
            "title" => "Positions",
            "menu_id" => 6,
            "path" => "positions",
            "icon" => "categories.svg",
            "sort" => 3
        ]);     

        Menu::create([ // id 14
            "title" => "Development",
            "menu_id" => null,
            "path" => "#",
            "icon" => "",
            "sort" => 4
        ]);

        Menu::create([ // id 15
            "title" => "Menus",
            "menu_id" => 14,
            "path" => "menus",
            "icon" => "menus.svg",
            "sort" => 1
        ]);

    }
}

