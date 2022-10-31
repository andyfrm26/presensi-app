<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresensiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\PresensiUser::factory()->create([
            'presensi_id' => 1,
            'user_id' => 1,
            'status' => 'hadir',

        ]);
    }
}
