<?php

use Illuminate\Database\Seeder;
use App\HookahPlace;
use Illuminate\Support\Str;

class HookahPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items_amount = 10;

        for ($i=0; $i<$items_amount; $i++) {

            do {
                $hookah_place_name = ucfirst(Str::random(10));
                $hookah_place = HookahPlace::query()
                    ->where('name', $hookah_place_name)
                    ->first();
            } while($hookah_place);

            HookahPlace::query()->create([
                'name' => $hookah_place_name
            ]);
        }
    }
}
