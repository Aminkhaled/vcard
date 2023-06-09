<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'aminabdo8@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwertoA27'),
            'is_admin' => 1
        ]);
    }
}
