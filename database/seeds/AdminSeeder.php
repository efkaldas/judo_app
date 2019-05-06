<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'club' => 'Administrator',
            'phone' => '864361385',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('eevaldass1'),
            'admin' => 1,
            'approved_at' => now(),
        ]);
    }
}