<?php

namespace App\Http\Controllers;

use App\Petty;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petty = Petty::all();
        $pettymasuk = Petty::where('jenis_transaksi', 'masuk')->sum('nilai_transaksi');
        $masuk = number_format($pettymasuk, 0, ".", ".");

        $pettykeluar = Petty::where('jenis_transaksi', 'keluar')->sum('nilai_transaksi');
        $keluar = number_format($pettykeluar, 0, ".", ".");

        $pettysaldo = $pettymasuk - $pettykeluar;
        $saldo = number_format($pettysaldo, 0, ".", ".");

        $jumlah = Petty::all()->count();

        // dd($jumlah, $masuk, $keluar, $saldo);
        return view('petty.index', compact('petty', 'masuk', 'keluar', 'saldo', 'jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ref_akun = Account::all();
        return view('petty.buat_petty', compact('ref_akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $total = str_replace(',', '', $request->nilai_transaksi);
        $this->validate(request(),  [
            'tanggal' => 'required',
            'nilai_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'referensi_akun' => 'required',
            'keterangan' => 'required|min:5',
            'keterangan' => 'required',
            'penerima' => 'required',
        ], [
            'tanggal.required' => "Tanggal tidak boleh kosong",
            'keterangan.required' => 'Keterangan Tidak Boleh Kosong',
            'keterangan.min' => 'Keterangan Minimal 5 Karakter',
            'penerima.required' => 'Penerima Tidak Boleh Kosong',
            'nilai_transaksi.required' => 'Nilai transaksi tidak boleh kosong',
            'jenis_transaksi.required' => "Jenis Transaksi tidak boleh kosong",
        ]);

        Petty::create([
            'tanggal' => $request->tanggal,
            'nilai_transaksi' => $total,
            'jenis_transaksi' => $request->jenis_transaksi,
            'referensi_akun' => $request->referensi_akun,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/petty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petty  $petty
     * @return \Illuminate\Http\Response
     */
    //
    public function show(Request $request)
    {
        // $search = $request->search;
        //mengambil tanggal dari search
        $date1 = substr($request->search, 0, 10);
        $date2 = substr($request->search, 13, 10);
        $petty = DB::table('petty')
            ->whereBetween('tanggal', [$date1, $date2])
            ->get();

        $pettymasuk = DB::table('petty')
            ->whereBetween('tanggal', [$date1, $date2])
            ->where(function ($query) {
                $query->where('jenis_transaksi', '=', 'masuk');
            })
            ->sum('nilai_transaksi');
        $masuk = number_format($pettymasuk, 0, ".", ".");

        // dd($masuk);
        $pettykeluar = DB::table('petty')
            ->whereBetween('tanggal', [$date1, $date2])
            ->where(function ($query) {
                $query->where('jenis_transaksi', '=', 'keluar');
            })
            ->sum('nilai_transaksi');
        $keluar = number_format($pettykeluar, 0, ".", ".");

        $pettysaldo = $pettymasuk - $pettykeluar;
        $saldo = number_format($pettysaldo, 0, ".", ".");

        $jumlah = DB::table('petty')
            ->whereBetween('tanggal', [$date1, $date2])
            ->count();

        return view('petty.index', compact('petty', 'masuk', 'keluar', 'jumlah', 'saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petty  $petty
     * @return \Illuminate\Http\Response
     */
    public function edit(Petty $petty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petty  $petty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petty $petty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petty  $petty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petty $petty)
    {
        //
    }

    public function validation(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nilai_transaksi' => 'required|numeric',
            'jenis_transaksi' => 'required',
            'keterangan' => 'required|min:5|max:20',

        ]);
        return view('/petty', ['p' => $request]);
    }
}
