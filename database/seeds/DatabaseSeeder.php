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

        DB::table('products')->insert([
            ['name' => 'GTX 1060', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 299.99],
            ['name' => 'GTX 1070', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 399.99],
            ['name' => 'GTX 1080', 'description' => 'Tarjeta grafica NVIDIA', 'price' => 599.99],
        ]);
    }
}
