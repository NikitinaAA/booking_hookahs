<?php

use Illuminate\Database\Seeder;
use App\HookahPlace;

class HookahPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HookahPlace::class, 10)->create();
    }
}
