<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contacts;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 1)->create();
        factory(Contacts::class, 1)->create();
    }
}
