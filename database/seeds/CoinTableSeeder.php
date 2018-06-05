<?php

use Illuminate\Database\Seeder;
use App\Coins;

class CoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Coins::create([
        'type' => 'MXP'
      ]);

      Coins::create([
        'type' => 'USD'
      ]);
    }
}
