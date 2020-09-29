<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Pelanggan;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $invoice = Invoice::all();
        $transaksi = Invoice::all()->count();
        $totaldb = Invoice::all()->sum('total_tagihan');
        $total = number_format($totaldb, 0, ".", ".");
        return view('invoice.index', compact('invoice', 'pelanggan', 'transaksi', 'total'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('invoice.buatinvoice', compact('pelanggan'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nomor_faktur' => 'required',
            'tanggal_invoice' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'faximile' => 'required',
            'jatuh_tempo' => 'required',
            'metode_pembayaran' => 'required',
            'keterangan' => 'required|min:3',
            'kuantitas' => 'required',
            'harga_satuan' => 'required',
            'pajak' => 'required',
            'total_tagihan' => 'required',
            'terbilang' => 'required',
            'pelanggan' => 'required',
            'status_invoice' => 'required',
        ], [
            'nomor_faktur.required' => 'Nomor faktur tidak boleh kosong',
            'nomor_faktur.required' => 'Nomor faktur tidak boleh kosong',
            'jatuh_tempo.required' => 'Jatuh tempo tidak boleh kosong',
            'metode_pembayaran.required' => 'Metode Pembayaran tidak boleh kosong',
            'keterangan.required' => 'Keterangan Tidak Bole Kosong',
            'keterangan.min' => 'Keterangan Minimal 3 Karakter',
            'kuantitas.required' => 'Kuantitas tidak boleh kosong',
            'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
            'pajak.required' => 'Pajak tidak boleh kosong',
            'total_tagihan.required' => 'Total Tagihan tidak boleh kosong',
            'terbilang.required' => "Terbilang tidak boleh kosong",
            ]);
            $kuantitas = str_replace(',', '', $request->kuantitas);
            $harga_satuan = str_replace(',', '', $request->harga_satuan);
            $total_tagihan = str_replace('.', '', $request->total_tagihan);
        $harga_penjualan = $kuantitas * $harga_satuan;
        
        $pelanggan = DB::table('pelanggan')
        ->where('id', $request->pelanggan)
        ->first();
        // dd($harga_penjualan, $kuantitas, $harga_satuan);
        Invoice::create([

            'nomor_faktur' => $request->nomor_faktur,
            'tanggal_invoice' => $request->tanggal_invoice,
            'pelanggan_id' => $request->pelanggan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'faximile' => $request->faximile,
            'jatuh_tempo' => $request->jatuh_tempo,
            'metode_pembayaran' => $request->metode_pembayaran,
            'keterangan' => $request->keterangan,
            'kuantitas' => $kuantitas,
            'harga_satuan' => $harga_satuan,
            'harga_penjualan' => $harga_penjualan,
            'pajak' => $request->pajak,
            'total_tagihan' => $total_tagihan,
            'terbilang' => $request->terbilang,
            'pelanggan' => $pelanggan->instansi,
            'status_invoice' => $request->status_invoice,
            ]);
            return redirect('/invoice');
        }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date1 = substr($request->search, 0, 10);
        $date2 = substr($request->search, 13, 10);
        $invoice = DB::table('invoice')
        ->whereBetween('tanggal_invoice', [$date1, $date2])
            ->get();
            
        $pelanggan = Pelanggan::all();
        // $invoice = Invoice::all();

        $transaksi = DB::table('invoice')
            ->whereBetween('tanggal_invoice', [$date1, $date2])
            ->count();
            
            // dd($masuk);
            $invoicetotal = DB::table('invoice')
            ->whereBetween('tanggal_invoice', [$date1, $date2])
            ->sum('total_tagihan');
            $total = number_format($invoicetotal, 0, ".", ".");
            
            return view('invoice.index', compact('invoice', 'pelanggan', 'transaksi', 'total'));
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
        $invoice = DB::table('invoice')->where('id', $id)->get();
        return view('invoice.edit', ['invoice' => $invoice]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $total = str_replace(',', '', $request->total);
        DB::table('invoice')->where('id', $request->id)->update([
            'tanggal_invoice' => $request->tanggal_invoice,
            'nomor_faktur' => $request->nomor_faktur,
            'pelanggan' => $request->pelanggan,
            'status_invoice' => $request->status_invoice,
            'keterangan' => $request->keterangan,
            'total_tagihan' => $request->total_tagihan,
            ]);
            return redirect('/invoice');
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
        
        public function hapus($id)
        {
            DB::table('invoice')->where('id', $id)->delete();
            return redirect('/invoice');
    }
    
    public function getinfo($id)
    {
        $info = Pelanggan::where('id', $id)->first();
        return response()->json($info);
    }
    
    public function preview($id)
    {
        $info = Invoice::where('id', $id)->first();
        $invoice = Invoice::where('id', $id)->get();
        // $invoice = Invoice::limit(5)->get();
        $faktur = $info['nomor_faktur'];
        $tanggalinvoice = $info['tanggal_invoice'];
        $pecahkan = explode('-', $tanggalinvoice);
        $tanggal = $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
        // return view('invoice.preview', ['invoice'=>$invoice]);

        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan2 = explode('-', $tanggal);
            return $pecahkan2[2] . ' ' . $bulan[(int) $pecahkan2[1]] . ' ' . $pecahkan2[0];
        }
        $tanggaltempo = $info['jatuh_tempo'];
        $tempo = tgl_indo($tanggaltempo);

        $nama = $info['pelanggan'];
        $alamat = $info['alamat'];
        $telp = $info['telepon'];
        $faks = $info['faximile'];
        $hargasatuan = number_format($info['harga_satuan'], 0, ".", ".");
        $hargapenjualan = number_format($info['harga_penjualan'], 0, ".", ".");
        $totaltagihan = number_format($info['total_tagihan'], 0, ".", ".");
        if ($info['status_invoice'] == 'Lunas') {
            $sisa = 0;
        } else {
            $sisa = $totaltagihan;
        }
        // dd($faktur, $info, $tanggal, $nama, $alamat, $telp, $faks, $tempo);
        return view('invoice.preview', compact('invoice', 'info', 'faktur', 'tanggal', 'nama', 'alamat', 'telp', 'faks', 'tempo', 'hargasatuan', 'hargapenjualan', 'totaltagihan', 'sisa'));
    }
}
