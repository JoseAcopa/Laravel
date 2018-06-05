<?php

use Illuminate\Database\Seeder;
use App\Units;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Units::create([
        'type' => 'Metros'
      ]);

      Units::create([
        'type' => 'Pies'
      ]);

      Units::create([
        'type' => 'Piezas'
      ]);

      Units::create([
        'type' => 'Otros'
      ]);
    }
}
