<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Presensi::factory()->create([
            'title' => 'Pengantar Evaluasi Sistem Informasi',
            'note' => 'Ceramah Materi 9 IESI',
            'is_active' => true,
            'end_time' => '2022-11-14 23:59:59',
        ]);
        \App\Models\Presensi::factory()->create([

            'title' => 'Metode Penelitian dan Penulisan Ilmiah',
            'note' => 'Literature Review',
            'is_active' => true,
            'end_time' => '2022-10-20 23:59:59',
        ]);
        \App\Models\Presensi::factory()->create([
            'title' => 'UTS',
            'note' => 'UTS Etika Profesi',
            'is_active' => true,
            'end_time' => '2022-11-15 23:59:59',
        ]);


        
    
    }
}
