<?php

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
        factory(App\User::class, 20)->create();
        factory(App\annuncio::class, 15)->create();
        factory(App\FAQ::class, 3)->create();
    }
}
