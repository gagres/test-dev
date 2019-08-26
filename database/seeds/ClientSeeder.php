<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            Client::create([
                'id' => 1,
                'name' => Str::random(10),
                'email' => 'test1@email.com'
            ]);
            Client::create([
                'id' => 2,
                'name' => Str::random(10),
                'email' => 'test2@email.com'
            ]);
            Client::create([
                'id' => 3,
                'name' => Str::random(10),
                'email' => 'test3@email.com'
            ]);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            Log::error('ClientSeeder cannot finish seed operation', $e->getMessage());
        }
    }
}
