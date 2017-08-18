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
            ['name' => 'Metroidvania'],
        ]);

        DB::table('products')->insert([
            ['name' => 'Ni no Kuni', 
            'description' => 'Ni no Kuni es un videojuego de rol desarrollado por la empresa japonesa Level-5 conjuntamente con el estudio de animación Ghibli, para Nintendo DS y PlayStation 3.', 
            'price' => 23.99, 
            'image' => 'Ni_no_kuni.jpg', 
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

            ['name' => 'Ori and the Blind Forest', 
            'description' => 'Ori and the Blind Forest es un videojuego de plataforma aventura de un jugador con el estilo de Metroidvania diseño por Moon Studios, un desarrollador independiente, y publicado por Microsoft Studios.', 
            'price' => 19.99, 
            'image' => 'Ori_and_the_Blind_Forest.jpg', 
            'category_id' => 4],

            ['name' => 'Hollow Knight', 
            'description' => 'Hollow Knight PC es un vídeo juego de acción  en una aventura de estilo clásico 2D a través de un vasto mundo interconectado. Explore cavernas retorcidas, ciudades antiguas y desechos mortales; Batalla criaturas contaminadas; Y resolver antiguos misterios en el corazón del reino. avanza en la profundidades de un reino olvidado y no descubierto muchos se han imaginado buscando riquezas, descubriendo secretos o grandes respuestas a este mundo, tu deberás adentrarte en esta desolada cuidad, elige tus propios caminos en Hollow Knight seras libre de decidir el destino hacia donde deseas ir pero prepárate por que en cada camino habrá terribles y poderosos monstruos que buscaran impedir tu paso encuentra mas de 130 enemigos y 30 Jefes para que esta se convierta en una experiencia unica en vídeo juegos.', 
            'price' => 14.99, 
            'image' => 'Hollow_Knight.jpg', 
            'category_id' => 5],

            ['name' => 'Mass Effect 2', 
            'description' => 'Mass Effect 2 es un videojuego de rol de acción desarrollado por BioWare Edmonton, con la asistencia de BioWare de Montreal, y publicado por Electronic Arts.', 
            'price' => 19.99, 
            'image' => 'MassEffect2.png', 
            'category_id' => 3],

            ['name' => 'Middle-Earth: Shadow of Mordor', 
            'description' => 'La Tierra Media: Sombras de Mordor es un videojuego de rol y acción en tercera persona desarrollado por Monolith Productions y distribuido por Warner Bros. Interactive Entertainment para Windows, PlayStation 3, PlayStation 4, Xbox 360 y Xbox One.',
            'price' => 18.99, 
            'image' => 'Middle_Earth_Shadow_of_Mordor.jpg', 
            'category_id' => 2],

            ['name' => 'To the Moon', 
            'description' => 'To The Moon es una aventura gráfica indie diseñada por Kan «Reives» Gao y desarrollada por Freebird Games para Microsoft Windows, la cuál recibió su port a dispositivos moviles el 12 de mayo de 2017.', 
            'price' => 9.99, 
            'image' => 'tothemoon.jpg', 
            'category_id' => 2],

            ['name' => 'Dark Souls III', 
            'description' => 'Dark Souls III es un videojuego de rol de acción desarrollado por FromSoftware y publicado por Bandai Namco Entertainment para PlayStation 4, Xbox One y Microsoft Windows.', 
            'price' => 59.99, 
            'image' => 'Dark_souls_3.jpg', 
            'category_id' => 1],

            ['name' => 'Metal Gear Solid V: The Phantom Pain', 
            'description' => 'Metal Gear Solid V: The Phantom Pain es un videojuego de sigilo y acción-aventura de la saga Metal Gear, desarrollado por Kojima Productions y producido por Hideo Kojima, para las videoconsolas PlayStation 3, PlayStation 4, Xbox 360, Xbox One y PC.', 
            'price' => 19.99, 
            'image' => 'MetalGearSolid5.jpg', 
            'category_id' => 2],

            ['name' => 'Tales of Zestiria', 
            'description' => 'Tales of Zestiria es un videojuego de RPG japonés producido por Namco Bandai Games. El juego de vídeo fue lanzado con motivo de la celebración de los 20 años​ de la franquicia Tales of siendo este el decimoquinto juego de la serie principal, el juego está disponible para las consolas PlayStation 3, PlayStation 4 y además es la primera entrega a la plataforma de PC​ de la mano de Steam.', 
            'price' => 49.99, 
            'image' => 'Tales_of_Zestiria.png', 
            'category_id' => 1],

            ['name' => 'Life Is Strange', 
            'description' => 'Life Is Strange es un videojuego episódico de aventura gráfica desarrollado por Dontnod Entertainment y distribuido por Square Enix. El juego se compone de cinco episodios.', 
            'price' => 19.99, 
            'image' => 'life-is-strange.jpg', 
            'category_id' => 1],
        ]);
    }
}
