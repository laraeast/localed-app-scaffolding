<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Admin::class)->create([
            'name'  => 'Admin',
            'email' => 'admin@demo.com',
        ]);

        factory(\App\Models\User::class, 3)->create();
    }
}
