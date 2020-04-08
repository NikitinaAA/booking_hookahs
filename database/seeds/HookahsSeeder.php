<?php

use Illuminate\Database\Seeder;
use App\Hookah;

class HookahsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hookah::class, 50)->create();
    }
}
