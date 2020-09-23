<?php

namespace App\Http\Controllers;

use App\LabaRugi;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labarugi = LabaRugi::all();
        return view('labarugi.index', compact('labarugi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labarugi.index');
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
            'bulan_transaksi' => 'required',
            'jasa_projek' => 'required',
            'total_penerimaan' => 'required',
            'svr' => 'required',
            'transportasi' => 'required',
            'laporan' => 'required',
            'lain_lain_biayaprojek' => 'required',
            'total_biaya_projek' => 'required',
            'gaji_direktur' => 'required',
            'gaji_staf' => 'required',
            'biaya_penyusutan_labarugi' => 'required',
            'total_biaya_tetap' => 'required',
            'atk' => 'required',
            'listrik_air_telepon' => 'required',
            'internet' => 'required',
            'lain_lain_administrasi' => 'required',
            'total_biaya_administrasi' => 'required',
            'laba_sb_pajak' => 'required',
            'pajak_adm' => 'required',
            'laba_bersih_adm' => 'required',
        ], [
            'bulan_transaksi.required' => "Tidak boleh kosong",
            'jasa_projek.required' => "Tidak boleh kosong",
            'total_penerimaan.required' => "Tidak boleh kosong",
            'svr.required' => "Tidak boleh kosong",
            'transportasi.required' => "Tidak boleh kosong",
            'laporan.required' => "Tidak boleh kosong",
            'lain_lain_biayaprojek.required' => "Tidak boleh kosong",
            'total_biaya_projek.required' => "Tidak boleh kosong",
            'gaji_direktur.required' => "Tidak boleh kosong",
            'gaji_staf.required' => "Tidak boleh kosong",
            'biaya_penyusutan_labarugi.required' => "Tidak boleh kosong",
            'total_biaya_tetap.required' => "Tidak boleh kosong",
            'atk.required' => "Tidak boleh kosong",
            'listrik_air_telepon.required' => "Tidak boleh kosong",
            'internet.required' => "Tidak boleh kosong",
            'lain_lain_administrasi.required' => "Tidak boleh kosong",
            'total_biaya_administrasi.required' => "Tidak boleh kosong",
            'laba_sb_pajak.required' => "Tidak boleh kosong",
            'pajak_adm.required' => "Tidak boleh kosong",
            'laba_bersih_adm.required' => "Tidak boleh kosong",
        ]);

        LabaRugi::create([
            'bulan_transaksi' => $request->bulan_transaksi,
            'jasa_projek' => $request->jasa_projek,
            'total_penerimaan' => $request->total_penerimaan,
            'svr' => $request->svr,
            'transportasi' => $request->transportasi,
            'laporan' => $request->laporan,
            'lain_lain_biayaprojek' => $request->lain_lain_biayaprojek,
            'total_biaya_projek' => $request->total_biaya_projek,
            'gaji_direktur' => $request->gaji_direktur,
            'gaji_staf' => $request->gaji_staf,
            'biaya_penyusutan_labarugi' => $request->biaya_penyusutan_labarugi,
            'total_biaya_tetap' => $request->total_biaya_tetap,
            'atk' => $request->atk,
            'listrik_air_telepon' => $request->listrik_air_telepon,
            'internet' => $request->internet,
            'lain_lain_administrasi' => $request->lain_lain_administrasi,
            'total_biaya_administrasi' => $request->total_biaya_administrasi,
            'laba_sb_pajak' => $request->laba_sb_pajak,
            'pajak_adm' => $request->pajak_adm,
            'laba_bersih_adm' => $request->laba_bersih_adm,
        ]);

        return redirect('/labarugi')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LabaRugi  $labaRugi
     * @return \Illuminate\Http\Response
     */
    public function show(LabaRugi $labaRugi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LabaRugi  $labaRugi
     * @return \Illuminate\Http\Response
     */
    public function edit(LabaRugi $labaRugi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LabaRugi  $labaRugi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabaRugi $labaRugi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LabaRugi  $labaRugi
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabaRugi $labaRugi)
    {
        //
    }
}
