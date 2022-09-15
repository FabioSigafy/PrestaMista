<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name'=> 'Fabio Pinheiro',
            'email' => 'ti1@sigafyseguros.com.br',
            'password' => bcrypt('12345678')
        ]);
    }
}
