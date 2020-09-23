<?php

use Illuminate\Database\Seeder;
use App\kategori_surat;

class kategori_suratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori_surat::insert([
            [
                'id' => '1',
                'nama_kategori' => 'Faktur',
            ],
            [
                'id' => '2',
                'nama_kategori' => 'Kwitansi',
            ],
            [
                'id' => '3',
                'nama_kategori' => 'Penawaran Harga',
            ],
            [
                'id' => '4',
                'nama_kategori' => 'Memorandum of Understanding',
            ],
            [
                'id' => '5',
                'nama_kategori' => 'Permintaan',
            ],
            [
                'id' => '6',
                'nama_kategori' => 'Keterangan',
            ],
            [
                'id' => '7',
                'nama_kategori' => 'Penerimaan Magang',
            ],
        ]);
    }
}
