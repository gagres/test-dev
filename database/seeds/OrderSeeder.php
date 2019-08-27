<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
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
            Order::create([
                'client_id' => 1,
                'ticket_id' => 1
            ]);
            Order::create([
                'client_id' => 1,
                'ticket_id' => 2
            ]);
            Order::create([
                'client_id' => 2,
                'ticket_id' => 3
            ]);
            Order::create([
                'client_id' => 2,
                'ticket_id' => 6
            ]);
            Order::create([
                'client_id' => 3,
                'ticket_id' => 4
            ]);
            Order::create([
                'client_id' => 3,
                'ticket_id' => 5
            ]);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            Log::error('ClientSeeder cannot finish seed operation', $e->getMessage());
        }
    }
}
