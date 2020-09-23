<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Penjualan
        return [
            'tanggal' => 'required',
            'nomor_faktur' => 'required',
            'referensi_akun' => 'required',
            'nama_pelanggan' => 'required|min:5',
            'status_penjualan' => 'required',
            'total' => 'required',
    

        // Pembelian
    
            'tanggal' => 'required',
            'nomor_faktur' => 'required|min:4',
            'referensi_akun' => 'required',
            'status_pembelian' => 'required',
            'total' => 'required',
            'supplier' => 'required|min:5',
        

        // Biaya
    
            'tanggal' => 'required',
            'penerima' => 'required|min:5|unique:biaya',
            'jenis_biaya' => 'required',
            'status' => 'required',
            'referensi_akun' => 'required',
            'keterangan' => 'required',
            'tag' => 'required',
            'total' => 'required',
        

        // PattyCash
    
            'tanggal' => 'required',
            'nilai_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'referensi_akun' => 'required',
            'keterangan' => 'required',
        

        // Invoice
    
            'nomor_faktur' => 'required',
            'tanggal_invoice' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'faximile' => 'required',
            'jatuh_tempo' => 'required',
            'metode_pembayaran' => 'required',
            'keterangan' => 'required',
            'harga_satuan' => 'required',
            'pajak' => 'required',
            'total_tagihan' => 'required',
            'terbilang' => 'required',
            'pelanggan' => 'required',
            'status_invoice' => 'required',

            // Surat
            'jenis' => 'required',
            'kategori_id' => 'required|numeric',
            'nomor_surat' => 'required',
            'tanggal_terima' => 'required',
            'tanggal_surat' => 'required',
            'asal_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'surat_path' => 'required|mimes:pdf,xlx,csv,doc,docx,jpg,png,jpeg|max:2048',
        ];
    }

    public function messages()
    {
        // Penjualan
        return [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'nomor_faktur.required' => 'Nomor Fakur tidak boleh kosong',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'nama_pelanggan.min' => 'Nama Pelanggan minimal 5 karakter',
            'status_penjualan.required' => 'Status Penjualan tidak boleh kosong',
            'total.required' => 'Total Penjualan tidak boleh kosong',
       

        // Pembelian
        
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'nomor_faktur.required' => 'Nomor Fakur tidak boleh kosong',
            'nomor_faktur.min' => 'Nomor Faktur minimal 4 karakter',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'status_pembelian.required' => 'Status Pembelian tidak boleh kosong',
            'total.required' => 'Total Pembelian tidak boleh kosong',
            'supplier.required' => 'Supplier tidak boleh kosong',
            'supplier.min' => 'Nama Supplier Minimal 5 karakter',
       

        // Biaya
        
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'penerima.required' => 'Nama Penerima tidak boleh kosong',
            'jenis_biaya.required' => 'Jenis Biaya tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'tag.required' => 'Tag tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong',
            'penerima.min' => 'Nama Penerima minimal 5 karakter',
       

        // PattyCash
        
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'nilai_transaksi.required' => 'Nilai Transaksi tidak boleh kosong',
            'jenis_transaksi.required' => 'Jenis Transaksi tidak boleh kosong',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
       

        // Invoice
        
            'nomor_faktur.required' => 'Nomor Faktur tidak boleh kosong',
            'tanggal_invoice.required' => 'Tanggal invoice tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'faximile.required' => 'Fax tidak boleh kosong',
            'jatuh_tempo.required' => 'Tanggal jatuh tempo tidak boleh kosong',
            'metode_pembayaran.required' => 'Metode Pembayaran tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
            'pajak.required' => 'Pajak tidak boleh kosong',
            'total_tagihan.required' => 'Total Tagihan tidak boleh kosong',
            'terbilang.required' => 'Tidak boleh kosong',
            'pelanggan.required' => 'Pelanggan tidak boleh kosong',
            'status_invoice.required' => 'Status Invoice tidak boleh kosong',

            // Surat
            'jenis.required' => 'jenis surat tidak bole kosong',
            'kategori_id.required' => 'Tidak boleh kosong',
            'kategori_id.numeric' => 'Harus angka',
            'nomor_surat.required' => 'Tidak boleh kosong',
            'tanggal_terima.required' => 'Tidak boleh kosong',
            'tanggal_surat.required' => 'Tidak boleh kosong',
            'asal_surat.required' => 'Tidak boleh kosong',
            'tujuan_surat.required' => 'Tidak boleh kosong',
            'perihal.required' => 'Tidak boleh kosong',
            'surat_path.required' => 'Tidak boleh kosong',
            'surat_path.mimes' => 'File harus format pdf,xlx,csv,doc,docx,jpg,png,jpeg',
            'surat_path.max' => 'maximal 2048',

        ];
    }
}
