<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Http\Requests\SendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\Akun;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penjualan = Penjualan::all();
        $penjualan_belum = Penjualan::where('status_penjualan', 'Belum')->sum('total');
        // $penjualan_tempo = Penjualan::where('status_penjualan', 'Belum')->sum('total');
        $tampilpenjualanbelum = number_format($penjualan_belum, 0, ".", ".");
        $month = date('m');
        $lunas = DB::table('penjualan')
            ->whereMonth('tanggal', $month)
            ->where('status_penjualan', '=', 'Lunas')
            ->sum('total');
        $tampillunas = number_format($lunas, 0, ".", ".");

        $date = date('Y-m-d');
        $tempo = DB::table('penjualan')
            ->whereDate('tanggal', '<',$date)
            ->where('status_penjualan', '=', 'Belum')
            ->sum('total');
        $jatuhtempo = number_format($tempo, 0, ".", ".");

        // dd($lunas);
        return view('penjualan.index', compact('penjualan', 'tampilpenjualanbelum', 'lunas', 'tampillunas','jatuhtempo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ref_akun = Akun::all();
        $no_faktur = Penjualan::orderBy('id', 'desc')->first();
        // dd($no_faktur);
        if ($no_faktur == null) {
            $nomor = 0;
        } else {
            $nomor = substr($no_faktur->nomor_faktur, 2);
        }

        $faktur = $nomor + 1;

        return view('penjualan.buat_penjualan', compact('ref_akun', 'no_faktur', 'faktur'));
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
            'nama_pelanggan' => 'required|min:5',
            'status_penjualan' => 'required',
            'total' => 'required',
        ], [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'nama_pelanggan.required' => 'Nama Pelanggan Tidak Boleh kosong',
            'nama_pelanggan.min' => 'Minimal 5 karakter',
            'status_penjualan.required' => 'Tidak boleh kosong',
            'total.required' => 'Total tidak boleh kosong'
        ]);

        Penjualan::create([
            'tanggal' => $request->tanggal,
            'status_penjualan' => $request->status_penjualan,
            'nomor_faktur' => $request->nomor_faktur,
            'referensi_akun' => $request->referensi_akun,
            'total' => $total,
            'nama_pelanggan' => $request->nama_pelanggan,
        ]);
        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualan = DB::table('penjualan')->where('id', $id)->get();
        return view('penjualan.edit', ['penjualan' => $penjualan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $total = str_replace(',', '', $request->total);
        DB::table('penjualan')->where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'status_penjualan' => $request->status_penjualan,
            'nomor_faktur' => $request->nomor_faktur,
            'total' => $total,
            'nama_pelanggan' => $request->nama_pelanggan,
        ]);
        return redirect('/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }

    public function hapus($id)
    {
        DB::table('penjualan')->where('id', $id)->delete();
        return redirect('/penjualan');
    }

    public function getinfo($id)
    {
        $info = Akun::where('nama_akun', $id)->first();
        return response()->json($info);
    }
}
    //     public function rules()
    //     {
    //         return [
    //             'tanggal' => ['required', new OnlyUppercase],
    //             'nomor_faktur' => 'required',
    //             'referensi_akun' => 'required',
    //             'nama_pelanggan' => 'required|max:200',
    //             'status_penjualan' => 'required',
    //             'total' => 'required|numeric'
    //         ];

    //         // return view('/penjualan',['p' => $request]);
    //     }
    //     public function messages()
    //     {
    //         return [
    //             'tanggal.required' => 'Tanggal tidak boleh kosong',
    //             'nomor_faktur.required' => 'Nomor Fakur tidak boleh kosong',
    //             'referensi_akun.required' => 'Referensi Akun tidak boleh kosong',
    //             'nama_pelanggan.max' => 'Nama Pelanggan maximal 20 karakter',
    //             'status_penjualan.required' => 'Status Penjualan tidak boleh kosong',
    //             'total.numeric' => 'Total harus berupa angka',
    //         ];
    // }
