<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call([
            OrderSeeder::class,
            TicketSeeder::class,
            ClientSeeder::class
        ]);
    }
}
