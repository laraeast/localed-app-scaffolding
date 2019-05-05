<?php

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
        $this->command->call('passport:install', ['--quiet' => true]);

        $this->command->call('medialibrary:clean');

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);

        $this->command->table(['name', 'email', 'password'], [
            [
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'password' => 'password',
            ],
        ]);
    }
}
