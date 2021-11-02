<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "title" => "Ensalada de Pollo",
            "price" => 8.01,
            "inventory" => 5 ,
            "photo" => "dish1.jpg"    
        ]);
        
        Product::create([
            "title" => "Pechuga de Pollo al Grill con Ensalada Fresca ",
            "price" => 10.99 ,
            "inventory" => 10,
            "photo" => "dish2.jpg"
        ]);
        
        Product::create([
            "title" => "Brochetas de Pollo y Ensalada Fresca",
            "price" => 19.99 ,
            "inventory" => 5 ,
            "photo" => "dish3.jpg"
        ]);
        
        Product::create([
            "title" => "Ensalada de Espinaca, Queso Fresco, Tomate y Aceitunas",
            "price" => 29.99 ,
            "inventory" => 3 ,
            "photo" => "dish4.jpg"
        ]);
        
        Product::create([
            "title" => "Salmón a la plancha con Ensalada Fresca",
            "price" => 12.01,
            "inventory" => 2 ,
            "photo" => "dish5.jpg"
        ]);
        
        Product::create([
            "title" => "Burritos de Pollo",
            "price" => 8.99 ,
            "inventory" => 10,
            "photo" => "dish6.jpg"
        ]);
        
        Product::create([
            "title" => "Tostadas de Aguacate y Huevo Cocido",
            "price" => 5.99 ,
            "inventory" => 5 ,
            "photo" => "dish7.jpg"
        ]);
        
        Product::create([
            "title" => "Brochetas de Salmón",
            "price" => 12.99 ,
            "inventory" => 3 ,
            "photo" => "dish8.jpg"
        ]);
    }
}
      
