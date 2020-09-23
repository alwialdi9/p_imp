<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembelian = Pembelian::all();
        $pembelian_belum = Pembelian::where('status_pembelian', 'Belum')->sum('total');
        $tampilpembelianbelum = number_format($pembelian_belum, 0, ".", ".");
        return view('pembelian.index', compact('pembelian', 'tampilpembelianbelum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ref_akun = Account::all();
        $no_faktur = Pembelian::orderBy('id', 'desc')->first();
        if ($no_faktur == null) {
            $nomor = 000;
        } else {
            $nomor = substr($no_faktur->nomor_faktur, 2);
        }
        $faktur = $nomor + 1;
        return view('pembelian.buat_pembelian', compact('ref_akun', 'no_faktur', 'faktur'));
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
            'nomor_faktur' => 'required',
            'referensi_akun' => 'required',
            'status_pembelian' => 'required',
            'total' => 'required',
            'supplier' => 'required|min:3',
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'nomor_faktur.required' => 'Nomor faktur tidak boleh kosong',
            'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
            'status_pembelian.required' => 'Status Pembelian tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong',
            'supplier.required' => 'Supplier tidak boleh kosong',
            'supplier.min' => 'Supplier minimal 3 karakter',
        ]);
        // dd($request->all());
        
        Pembelian::create([
            'tanggal' => $request->tanggal,
            'status_pembelian' => $request->status_pembelian,
            'nomor_faktur' => $request->nomor_faktur,
            'referensi_akun' => $request->referensi_akun,
            'total' => $total,
            'supplier' => $request->supplier,
        ]);
        
        return redirect('/pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = DB::table('pembelian')->where('id', $id)->get();
        return view('pembelian.edit', ['pembelian' => $pembelian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $total = str_replace(',', '', $request->total);
        DB::table('pembelian')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'status_pembelian' => $request->status_pembelian,
            'nomor_faktur' => $request->nomor_faktur,
            'total' => $total,
            'supplier' => $request->supplier,
        ]);
        return redirect('/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }

    public function hapus($id)
    {
        DB::table('pembelian')->where('id', $id)->delete();
        return redirect('/pembelian');
    }
}
