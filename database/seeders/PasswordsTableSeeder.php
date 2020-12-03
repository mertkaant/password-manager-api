<?php

namespace Database\Seeders;

use App\Models\Password;
use Illuminate\Database\Seeder;

class PasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Password::factory(10)->create();
    }
}
