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
            'country' => 'LTU',
            'city' => 'Kaunas',
            'club' => 'Administrator',
            'avatar' => 'default.png',
            'phone' => '864361385',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('eevaldass1'),
            'admin' => 1,
            'approved_at' => now(),
        ]);
        \App\User::create([
            'firstname' => 'Test',
            'lastname' => 'Testauskas',
            'country' => 'LTU',
            'city' => 'Kaunas',
            'club' => 'Testanas',
            'avatar' => 'default.png',
            'phone' => '864361385',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123test'),
            'admin' => 0,
            'approved_at' => now(),
        ]);
    }
}