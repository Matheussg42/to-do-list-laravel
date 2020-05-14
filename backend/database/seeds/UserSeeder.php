<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Teste Seeder",
            'email' => 'seeder@teste.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
