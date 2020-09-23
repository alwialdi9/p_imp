<?php

namespace App\Http\Controllers;

use App\Neraca;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neraca = Neraca::all();
        return view('neraca.index', compact('neraca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('neraca.index');
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
            'kas' => 'required',
            'piutang' => 'required',
            'persediaan' => 'required',
            'jumlah_aktiva_lancar' => 'required',
            'tanah' => 'required',
            'bangunan' => 'required',
            'peralatan' => 'required',
            'kendaraan' => 'required',
            'jumlah_aktiva_tetap' => 'required',
            'jumlah_aktiva' => 'required',
            'hutang_usaha' => 'required',
            'hutang_jatuhtempo' => 'required',
            'uang_muka_proyek' => 'required',
            'jumlah_kewajiban_lancar' => 'required',
            'hutang_bank' => 'required',
            'hutang_lainnya' => 'required',
            'jumlah_kewajiban_jangkapanjang' => 'required',
            'modal_disetor' => 'required',
            'laba_ditahan' => 'required',
            'jumlah_modal' => 'required',
            'jumlah_passiva' => 'required',
        ], [
            'bulan_transaksi.required' => "Tidak boleh Kosong",
            'kas.required' => "Tidak boleh Kosong",
            'piutang.required' => "Tidak boleh Kosong",
            'persediaan.required' => "Tidak boleh Kosong",
            'jumlah_aktiva_lancar.required' => "Tidak boleh Kosong",
            'tanah.required' => "Tidak boleh Kosong",
            'bangunan.required' => "Tidak boleh Kosong",
            'peralatan.required' => "Tidak boleh Kosong",
            'kendaraan.required' => "Tidak boleh Kosong",
            'jumlah_aktiva_tetap.required' => "Tidak boleh Kosong",
            'jumlah_aktiva.required' => "Tidak boleh Kosong",
            'hutang_usaha.required' => "Tidak boleh Kosong",
            'hutang_jatuhtempo.required' => "Tidak boleh Kosong",
            'uang_muka_proyek.required' => "Tidak boleh Kosong",
            'jumlah_kewajiban_lancar.required' => "Tidak boleh Kosong",
            'hutang_bank.required' => "Tidak boleh Kosong",
            'hutang_lainnya.required' => "Tidak boleh Kosong",
            'jumlah_kewajiban_jangkapanjang.required' => "Tidak boleh Kosong",
            'modal_disetor.required' => "Tidak boleh Kosong",
            'laba_ditahan.required' => "Tidak boleh Kosong",
            'jumlah_modal.required' => "Tidak boleh Kosong",
            'jumlah_passiva.required' => "Tidak boleh Kosong",
        ]);
        Neraca::create([
            'bulan_transaksi' => $request->bulan_transaksi,
            'kas' => $request->kas,
            'piutang' => $request->piutang,
            'persediaan' => $request->persediaan,
            'jumlah_aktiva_lancar' => $request->jumlah_aktiva_lancar,
            'tanah' => $request->tanah,
            'bangunan' => $request->bangunan,
            'peralatan' => $request->peralatan,
            'kendaraan' => $request->kendaraan,
            'jumlah_aktiva_tetap' => $request->jumlah_aktiva_tetap,
            'jumlah_aktiva' => $request->jumlah_aktiva,
            'hutang_usaha' => $request->hutang_usaha,
            'hutang_jatuhtempo' => $request->hutang_jatuhtempo,
            'uang_muka_proyek' => $request->uang_muka_proyek,
            'jumlah_kewajiban_lancar' => $request->jumlah_kewajiban_lancar,
            'hutang_bank' => $request->hutang_bank,
            'hutang_lainnya' => $request->hutang_lainnya,
            'jumlah_kewajiban_jangkapanjang' => $request->jumlah_kewajiban_jangkapanjang,
            'modal_disetor' => $request->modal_disetor,
            'laba_ditahan' => $request->laba_ditahan,
            'jumlah_modal' => $request->jumlah_modal,
            'jumlah_passiva' => $request->jumlah_passiva,
        ]);
        // Session::flash('berhasil','Data Berhasil Disimpan');
        return redirect('/neraca')->with('status', 'Data Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function show(Neraca $neraca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function edit(Neraca $neraca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neraca $neraca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neraca  $neraca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neraca $neraca)
    {
        //
    }
}
