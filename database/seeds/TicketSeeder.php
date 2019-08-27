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
                'content' => Str::random(10)
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10)
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10)
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10)
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10)
            ]);
            Ticket::create([
                'title' => Str::random(10),
                'content' => Str::random(10)
            ]);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            Log::error('ClientSeeder cannot finish seed operation', $e->getMessage());
        }
    }
}
