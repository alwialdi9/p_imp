<?php

namespace App\Http\Controllers;

use App\RencanaKas;
use Illuminate\Http\Request;
use Session;

class RencanaKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rencanaruskas = RencanaKas::all();
        return view('rencana.index', compact('rencanaruskas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rencana.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'bulan_transaksi_aruskas' => 'required',
            'jasa_projek_aruskas' => 'required',
            'total_penerimaan_aruskas' => 'required',
            'biaya_server_aruskas' => 'required',
            'biaya_transportasi_aruskas' => 'required',
            'biaya_laporan_aruskas' => 'required',
            'gaji_direktur_aruskas' => 'required',
            'gaji_staf_aruskas' => 'required',
            'biaya_penyusutan_aruskas' => 'required',
            'biaya_adm_aruskas' => 'required',
            'bunga_bank_aruskas' => 'required',
            'biaya_pajak_aruskas' => 'required',
            'total_pengeluaran_aruskas' => 'required',
            'total_biaya_aruskas' => 'required',
            'laba_sblm_pajak_aruskas' => 'required',
            'pajak_aruskas' => 'required',
        ], [
            'bulan_transaksi_aruskas.required' => "Tidak boleh kosong",
            'jasa_projek_aruskas.required' => "Tidak boleh kosong",
            'total_penerimaan_aruskas.required' => "Tidak boleh kosong",
            'biaya_server_aruskas.required' => "Tidak boleh kosong",
            'biaya_transportasi_aruskas.required' => "Tidak boleh kosong",
            'biaya_laporan_aruskas.required' => "Tidak boleh kosong",
            'gaji_direktur_aruskas.required' => "Tidak boleh kosong",
            'gaji_staf_aruskas.required' => "Tidak boleh kosong",
            'biaya_penyusutan_aruskas.required' => "Tidak boleh kosong",
            'biaya_adm_aruskas.required' => "Tidak boleh kosong",
            'bunga_bank_aruskas.required' => "Tidak boleh kosong",
            'biaya_pajak_aruskas.required' => "Tidak boleh kosong",
            'total_pengeluaran_aruskas.required' => "Tidak boleh kosong",
            'total_biaya_aruskas.required' => "Tidak boleh kosong",
            'laba_sblm_pajak_aruskas.required' => "Tidak boleh kosong",
            'pajak_aruskas.required' => "Tidak boleh kosong",
        ]);

        RencanaKas::create([
            'bulan_transaksi_aruskas' => $request->bulan_transaksi_aruskas,
            'jasa_projek_aruskas' => $request->jasa_projek_aruskas,
            'total_penerimaan_aruskas' => $request->total_penerimaan_aruskas,
            'biaya_server_aruskas' => $request->biaya_server_aruskas,
            'biaya_transportasi_aruskas' => $request->biaya_transportasi_aruskas,
            'biaya_laporan_aruskas' => $request->biaya_laporan_aruskas,
            'gaji_direktur_aruskas' => $request->gaji_direktur_aruskas,
            'gaji_staf_aruskas' => $request->gaji_staf_aruskas,
            'biaya_penyusutan_aruskas' => $request->biaya_penyusutan_aruskas,
            'biaya_adm_aruskas' => $request->biaya_adm_aruskas,
            'bunga_bank_aruskas' => $request->bunga_bank_aruskas,
            'biaya_pajak_aruskas' => $request->biaya_pajak_aruskas,
            'total_pengeluaran_aruskas' => $request->total_pengeluaran_aruskas,
            'total_biaya_aruskas' => $request->total_biaya_aruskas,
            'laba_sblm_pajak_aruskas' => $request->laba_sblm_pajak_aruskas,
            'pajak_aruskas' => $request->pajak_aruskas,
        ]);
        // Session::flash('berhasil','Data Berhasil Disimpan');
        return redirect('/rencanaaruskas')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RencanaKas  $rencanaKas
     * @return \Illuminate\Http\Response
     */
    public function show(RencanaKas $rencanaKas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RencanaKas  $rencanaKas
     * @return \Illuminate\Http\Response
     */
    public function edit(RencanaKas $rencanaKas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RencanaKas  $rencanaKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RencanaKas $rencanaKas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RencanaKas  $rencanaKas
     * @return \Illuminate\Http\Response
     */
    public function destroy(RencanaKas $rencanaKas)
    {
        //
    }
}
