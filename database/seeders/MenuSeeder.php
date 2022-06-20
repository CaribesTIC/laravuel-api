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
            "title" => "Message",
            "menu_id" => null,
            "path" => "message",
            "icon" => "tasks.svg",
            "sort" => 2
        ]);

        Menu::create([ // id 3
            "title" => "ShopCart",
            "menu_id" => null,
            "path" => "shopcart",
            "icon" => "journals.svg",
            "sort" => 3
        ]);

        Menu::create([ // id 4
            "title" => "Registrar",
            "menu_id" => null,
            "path" => "#",
            "icon" => "printer",
            "sort" => 1
        ]);
    
        Menu::create([ // id 5
            "title" => "Users",
            "menu_id" => 4,
            "path" => "users",
            "icon" => "users.svg",
            "sort" => 1
        ]);
        
        /*Menu::create([
            "title" => "Clientes",
            "menu_id" => 4,
            "path" => "clients",
            "icon" => "zones.svg",
            "sort" => 2
        ]);*/

        /*Menu::create([
            "title" => "Minutes",
            "menu_id" => 4,
            "path" => "minutes",
            "icon" => "posts.svg",
            "sort" => 3
        ]);*/

        Menu::create([ // id 6
            "title" => "Themes",
            "menu_id" => null,
            "path" => "#",
            "icon" => "users.svg",
            "sort" => 2
        ]);

        Menu::create([ // id 7
            "title" => "UI Elements",
            "menu_id" => 6,
            "path" => "ui-elements",
            "icon" => "categories.svg",
            "sort" => 1
        ]);

        Menu::create([ // id 8
            "title" => "Tables",
            "menu_id" => 6,
            "path" => "tables",
            "icon" => "dwelling-types.svg",
            "sort" => 2
        ]);

        Menu::create([ // id 9
            "title" => "Forms",
            "menu_id" => 6,
            "path" => "forms",
            "icon" => "dashboard.svg",
            "sort" => 3
        ]);

        Menu::create([ // id 10
            "title" => "Card",
            "menu_id" => 6,
            "path" => "card",
            "icon" => "zones.svg",
            "sort" => 4
        ]);

        Menu::create([ // id 11
            "title" => "Modal",
            "menu_id" => 6,
            "path" => "modal",
            "icon" => "posts.svg",
            "sort" => 5
        ]);

        Menu::create([ // id 12
            "title" => "Blank",
            "menu_id" => 6,
            "path" => "blank",
            "icon" => "journals.svg",
            "sort" => 6
        ]);

        Menu::create([ // id 13
            "title" => "Development",
            "menu_id" => null,
            "path" => "#",
            "icon" => "apple.svg",
            "sort" => 6
        ]);

        Menu::create([ // id 14
            "title" => "Menus",
            "menu_id" => 13,
            "path" => "menus",
            "icon" => "menus.svg",
            "sort" => 1
        ]);

        Menu::create([ // id 15
            "title" => "Roles",
            "menu_id" => 13,
            "path" => "roles",
            "icon" => "users.svg",
            "sort" => 1
        ]);

    }
}

