<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Ticket;

class TicketSeeder extends Seeder
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
            Ticket::create([
                    'title' => Str::random(10),
                    'content' => Str::random(10),
                    'order_number' => 1003,
                    'client_id' => 1
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10),
                'order_number' => 1003,
                'client_id' => 1
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10),
                'order_number' => 1004,
                'client_id' => 1
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10),
                'order_number' => 1005,
                'client_id' => 2
            ]);
            Ticket::create([
                    'title' => Str::random(10),
                    'content' => Str::random(10),
                    'order_number' => 1006,
                    'client_id' => 3
            ]);
            Ticket::create([
                    'title' => Str::random(10),
                    'content' => Str::random(10),
                    'order_number' => 1007,
                    'client_id' => 2
            ]);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            Log::error('ClientSeeder cannot finish seed operation', $e->getMessage());
        }
    }
}
