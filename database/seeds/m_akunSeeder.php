<?php

use Illuminate\Database\Seeder;
use App\Akun;

class m_akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::insert([
  ['id' => '1','kode_akun' => '1-10001','nama_akun' => 'Petty Cash','kategori_akun' => 'Kas & Bank'],
  ['id' => '2','kode_akun' => '1-10002','nama_akun' => 'Rekening Bank ','kategori_akun' => 'Kas & Bank'],
  ['id' => '3','kode_akun' => '1-10005','nama_akun' => 'Piutang Usaha','kategori_akun' => 'Akun Piutang'],
  ['id' => '4','kode_akun' => '1-10006','nama_akun' => 'Piutang Belum Ditagih','kategori_akun' => 'Akun Piutang'],
  ['id' => '5','kode_akun' => '1-10009','nama_akun' => 'Tanah','kategori_akun' => 'Aktiva Tetap'],
  ['id' => '6','kode_akun' => '1-10010','nama_akun' => 'Bangunan','kategori_akun' => 'Aktiva Tetap'],
  ['id' => '7','kode_akun' => '1-10011','nama_akun' => 'Kendaraan','kategori_akun' => 'Aktiva Lancar'],
  ['id' => '8','kode_akun' => '2-20001','nama_akun' => 'Hutang Usaha','kategori_akun' => 'Akun Hutang'],
  ['id' => '9','kode_akun' => '2-20002','nama_akun' => 'Sewa Usaha','kategori_akun' => 'Kewajiban Jangka Panjang'],
  ['id' => '10','kode_akun' => '3-30001','nama_akun' => 'Laba ditahan','kategori_akun' => 'Ekuitas'],
  ['id' => '11','kode_akun' => '4-40001','nama_akun' => 'Pendapatan Jasa','kategori_akun' => 'Pendapatan'],
  ['id' => '12','kode_akun' => '5-50001','nama_akun' => 'Pembelian','kategori_akun' => 'Beban Usaha'],
  ['id' => '13','kode_akun' => '5-50002','nama_akun' => 'Biaya Angkut Pembelian','kategori_akun' => 'Beban Usaha'],
  ['id' => '14','kode_akun' => '5-50003','nama_akun' => 'Retur Pembelian dan Pengurangan','kategori_akun' => 'Beban Usaha'],
  ['id' => '15','kode_akun' => '5-50004','nama_akun' => 'Potongan Harga','kategori_akun' => 'Beban Usaha'],
  ['id' => '16','kode_akun' => '6-60001','nama_akun' => 'Beban Gaji Direktur','kategori_akun' => 'Beban'],
  ['id' => '17','kode_akun' => '6-60002','nama_akun' => 'Beban Gaji Staff','kategori_akun' => 'Beban'],
  ['id' => '18','kode_akun' => '6-60003','nama_akun' => 'Beban Listrik','kategori_akun' => 'Beban'],
  ['id' => '19','kode_akun' => '6-60004','nama_akun' => 'Beban Air','kategori_akun' => 'Beban'],
  ['id' => '20','kode_akun' => '6-60005','nama_akun' => 'Beban Internet','kategori_akun' => 'Beban'],
  ['id' => '21','kode_akun' => '6-60006','nama_akun' => 'Beban Penyusutan Kendaraan','kategori_akun' => 'Beban'],
        ]);
    }
}
