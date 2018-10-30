<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $todos = factory(App\Models\Todo::class, 100)->create();
    }
}
