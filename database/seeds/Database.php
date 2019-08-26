<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call([
            TicketSeeder::class,
            ClientSeeder::class
        ]);
    }
}
