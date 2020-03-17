<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Hookah;
use App\HookahPlace;

class HookahsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items_amount = 50;

        for ($i=0; $i<$items_amount; $i++) {

            do {
                $hookah_name = ucfirst(Str::random(10));
                $tube_amount = rand(1, 4);

                $hookah = Hookah::query()
                    ->where('name', $hookah_name)
                    ->where('tube_amount', $tube_amount)
                    ->first();

            } while($hookah);

            $hookah_place = HookahPlace::query()->inRandomOrder()->first();

            Hookah::query()->create([
                'hookah_place_id' => $hookah_place->id,
                'name' => $hookah_name,
                'tube_amount' => $tube_amount
            ]);
        }
    }
}
