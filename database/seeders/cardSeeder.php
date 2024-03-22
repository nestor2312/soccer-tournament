<?php

namespace Database\Seeders;

use App\Models\card;
use Illuminate\Database\Seeder;

class cardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $card = new card();
        $card->tarjeta_A ="0";
        $card->tarjeta_R ="0";
        $card->save();

        $card = new card();
        $card->tarjeta_A ="1";
        $card->tarjeta_R ="1";
        $card->save();

        $card = new card();
        $card->tarjeta_A ="2";
        $card->tarjeta_R ="2";
        $card->save();

        $card = new card();
        $card->tarjeta_A ="3";
        $card->tarjeta_R ="3";
        $card->save();

    }
}
