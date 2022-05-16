<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Marca:: factory(50)->create();
        Categoria:: factory(50)->create();
    }
}
