<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name' => 'Admin',
        'slug' => 'super admin',
        'special' => 'all-access'
      ]);

      Role::create([
        'name' => 'Suspendido',
        'slug' => 'sin accesos',
        'special' => 'no-access'
      ]);
    }
}
