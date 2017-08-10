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
            ['name' => 'Ni no Kuni', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 299.99, 'category_id' => 1],
            ['name' => 'Rise of Tomb Raider', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 399.99, 'category_id' => 2],
            ['name' => 'The Witcher 3', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 599.99, 'category_id' => 1],
        ]);
    }
}
