<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eliminatoria;
use Illuminate\Support\Facades\DB;
class PlayoffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eliminatorias')->insert([
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'equipo_a_id' => null,
                'equipo_b_id' => null,
                'marcador1' => null,
                'marcador2' => null,
                'numPartido' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
          
        ]);
    }
}
