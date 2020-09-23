<?php

namespace App\Http\Controllers;

use App\Pbiaya;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;
use App\Account;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biaya = Pbiaya::all();
        $biaya_masuk = Pbiaya::where('jenis_biaya', 'masuk')->sum('total');
        $biaya_keluar = Pbiaya::where('jenis_biaya', 'keluar')->sum('total');
        $saldo = $biaya_masuk - $biaya_keluar;
        // $jatohtempo = DB::table('biaya')
        //              ->select(DB::raw(' as user_count, status'))
        //              ->where('status', '<>', 1)
        //              ->groupBy('status')
        //              ->get();

        $tampilmasuk = number_format($biaya_masuk, 0, ".", ".");
        $tampilkeluar = number_format($biaya_keluar, 0, ".", ".");
        $tampilsaldo = number_format($saldo, 0, ".", ".");
        return view('biaya.index', compact('biaya', 'tampilmasuk', 'tampilkeluar', 'tampilsaldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ref_akun = Account::all();
        return view('biaya.buat_biaya', compact('ref_akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = str_replace(',', '', $request->total);
        $this->validate(request(), [
            'tanggal' => 'required',
            'penerima' => 'required|min:5|unique:biaya',
            'jenis_biaya' => 'required',
            'status' => 'required',
            'referensi_akun' => 'required',
            'keterangan' => 'required',
            'tag' => 'required',
            'total' => 'required',
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'penerima.required' => 'Penerima tidak boleh kosong',
            'penerima.unique' => 'Nama Penerima tidak boleh sama',
            'penerima.min' => 'Penerima Minimal 5 Karatker',
            'penerima.unique' => 'Penerima Tidak boleh sama',
            'jenis_biaya.required' => 'Jenis Biaya tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'tag.required' => 'Tag tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong',
        ]);

        Pbiaya::create([

            'tanggal' => $request->tanggal,
            'penerima' => $request->penerima,
            'jenis_biaya' => $request->jenis_biaya,
            'status' => $request->status,
            'referensi_akun' => $request->referensi_akun,
            'keterangan' => $request->keterangan,
            'tag' => $request->tag,
            'total' => $total,
        ]);
        return redirect('/biaya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(Biaya $biaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Biaya $biaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biaya $biaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biaya $biaya)
    {
        //
    }
}
    // public function validation(Request $request)
    // {
    //     $this->validate($request,[
    //         'tanggal' => 'required',
    //         'penerima' => 'required',
    //         'jenis_biaya' => 'required',
    //         'status' => 'required',
    //         'referensi_akun' => 'required',
    //         'tag' => 'required',
    //         'keterangan' => 'required',
    //         'total' => 'required|numeric'
            
    //     ]);
    //     return view('/biaya',['b' => $request]);
    // }
