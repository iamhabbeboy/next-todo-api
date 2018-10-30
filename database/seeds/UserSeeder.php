<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todos = factory(App\Models\Users::class, 10)->create();
    }
}
