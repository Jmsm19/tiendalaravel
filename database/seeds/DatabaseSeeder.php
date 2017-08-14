<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('products')->delete();
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            ['name' => 'RPG'],
            ['name' => 'Adventure'],
            ['name' => 'Shooter'],
            ['name' => 'Plataformer'],
        ]);

        DB::table('products')->insert([
            ['name' => 'Ni no Kuni', 
            'description' => 'Ni no Kuni es un videojuego de rol desarrollado por la empresa japonesa Level-5 conjuntamente con el estudio de animación Ghibli, para Nintendo DS y PlayStation 3.', 
            'price' => 23.99, 
            'image' => 'Ni_no_kuni.png', 
            'category_id' => 1],
            
            ['name' => 'Rise of Tomb Raider', 
            'description' => 'Rise of The Tomb Raider es un videojuego de acción-aventura desarrollado por Crystal Dynamics. Es el undécimo videojuego de la serie Tomb Raider.', 
            'price' => 39.99, 
            'image' => 'Rise_of_the_Tomb_Raider.jpg', 
            'category_id' => 2],
            
            ['name' => 'The Witcher 3', 
            'description' => 'The Witcher 3: Wild Hunt es un videojuego de rol desarrollado por CD Projekt RED. CD Projekt RED es el desarrollador mientras que la distribución corre a cargo de la Warner Bros. Interactive, en el caso de Norteamérica y Bandai Namco para Europa.', 
            'price' => 39.99, 
            'image' => 'TW3_Wild_Hunt.png', 
            'category_id' => 1],
        ]);
    }
}
