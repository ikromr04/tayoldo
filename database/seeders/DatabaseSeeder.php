<?php

namespace Database\Seeders;

use App\Models\User;
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
    User::create([
      'login' => 'tayoldo@admin.tj',
      'role' => 'admin',
      'password' => bcrypt('xf8*Q5P*'),
    ]);

    $this->call([
      TextSeeder::class,
      // ProductSeeder::class,
    ]);
  }
}
