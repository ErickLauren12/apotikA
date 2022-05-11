<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert(
            ['name' => 'PT Obat Abadi',
            'address' => 'JL. Kebaruan',
            'category_id' => '1'
        ]);

        DB::table('suppliers')->insert(
            ['name' => 'PT Obat Banyak',
            'address' => 'JL. Merah',
            'category_id' => '3'
        ]);
    }
}
