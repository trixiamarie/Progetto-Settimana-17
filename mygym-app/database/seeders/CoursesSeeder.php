<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::create([
            'name' => 'Corso di Pilates',
            'description' => 'Esercizi per migliorare la postura e la forza centrale',
            'day' => 'Martedì', // Giorno specificato come "Martedì"
            'starthours' => '10:00:00', // Orario di inizio
            'endhours' => '18:00:00', // Orario di fine
            'price' => 54.99,
        ]);
        
        Courses::create([
            'name' => 'Corso di nuoto',
            'description' => 'Lezioni per imparare a nuotare e migliorare la tecnica',
            'day' => 'Giovedì', // Giorno specificato come "Giovedì"
            'starthours' => '11:00:00', // Orario di inizio
            'endhours' => '19:00:00', // Orario di fine
            'price' => 49.99,
        ]);
        
        Courses::create([
            'name' => 'Corso di danza',
            'description' => 'Esprimi te stesso attraverso il movimento e la musica',
            'day' => 'Lunedì', // Giorno specificato come "Lunedì"
            'starthours' => '12:00:00', // Orario di inizio
            'endhours' => '20:00:00', // Orario di fine
            'price' => 44.99,
        ]);
        
        Courses::create([
            'name' => 'Corso di kickboxing',
            'description' => 'Combina arti marziali e fitness per un allenamento intenso',
            'day' => 'Mercoledì', // Giorno specificato come "Mercoledì"
            'starthours' => '13:00:00', // Orario di inizio
            'endhours' => '21:00:00', // Orario di fine
            'price' => 59.99,
        ]);
        
        Courses::create([
            'name' => 'Corso di spinning',
            'description' => 'Allenamento cardiovascolare ad alta intensità su biciclette stazionarie',
            'day' => 'Venerdì', // Giorno specificato come "Venerdì"
            'starthours' => '14:00:00', // Orario di inizio
            'endhours' => '22:00:00', // Orario di fine
            'price' => 39.99,
        ]);
        
    }
}
