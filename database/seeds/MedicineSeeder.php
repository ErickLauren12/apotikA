<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'name' => "oksikodon",
            'formula' => "60 kaps/bulan",
            'description' => "Untuk nyeri berat yang
            memerlukan terapi opioid jangka
            panjang, around-the-clock, Tidak untuk terapi as needed
            (prn), Pasien tidak memiliki gangguan
            respirasi",
            'faskes_1' => 0,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 10000,
            'category_id' => 1,
        ]);

        DB::table('medicines')->insert([
            'name' => "petidin",
            'formula' => "2 amp/hari",
            'description' => "Hanya untuk nyeri sedang
            hingga berat pada pasien
            yang dirawat di Rumah
            Sakit, Tidak digunakan untuk nyeri
            kanker",
            'faskes_1' => 0,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 20000,
            'category_id' => 1,
        ]);

        DB::table('medicines')->insert([
            'name' => "ketoprofen",
            'formula' => "2 sup/hari, maks 3
            hari",
            'description' => "Untuk nyeri sedang sampai
            berat pada pasien yang tidak",
            'faskes_1' => 0,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 10000,
            'category_id' => 2,
        ]);

        DB::table('medicines')->insert([
            'name' => "ketorolak",
            'formula' => "2-3 amp/hari,
            maks 2 hari",
            'description' => "Untuk nyeri sedang sampai
            berat pada pasien yang tidak
            dapat menggunakan analgesik
            secara oral",
            'faskes_1' => 0,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 5000,
            'category_id' => 2,
        ]);

        DB::table('medicines')->insert([
            'name' => "alopurinol",
            'formula' => "30 tab/bulan",
            'description' => "Tidak diberikan pada saat nyeri akut",
            'faskes_1' => 1,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 15000,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'name' => "kolkisin",
            'formula' => "30 tab/bulan",
            'description' => "tab 500 mcg",
            'faskes_1' => 1,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 10000,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'name' => "gabapentin",
            'formula' => "30 tab/bulan",
            'description' => "Hanya untuk neuralgia pascaherpes
            atau nyeri neuropati diabetikum",
            'faskes_1' => 1,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 10000,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'name' => "karbamazepin",
            'formula' => "60 tab/bulan",
            'description' => "Hanya untuk neuralgia trigeminal",
            'faskes_1' => 1,
            'faskes_2' => 1,
            'faskes_3' => 1,
            'price' => 12000,
            'category_id' => 4,
        ]);
    }
}
