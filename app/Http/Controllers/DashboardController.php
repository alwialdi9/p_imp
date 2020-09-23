<?php

namespace App\Http\Controllers;

use App\Dasboard;
use App\Petty;
use App\Invoice;
use App\Pbiaya;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Anda harus login dulu');
        } else {
        $biaya_masuk = Pbiaya::where('jenis_biaya', 'masuk')->sum('total');
        $biaya_keluar = Pbiaya::where('jenis_biaya', 'keluar')->sum('total');
        $tampilmasuk = number_format($biaya_masuk, 0, ".", ".");
        $tampilkeluar = number_format($biaya_keluar, 0, ".", ".");

        $petty = Petty::all();
        $pettymasuk = Petty::where('jenis_transaksi', 'masuk')->sum('nilai_transaksi');
        $pettykeluar = Petty::where('jenis_transaksi', 'keluar')->sum('nilai_transaksi');

        $pettysaldo = $pettymasuk - $pettykeluar;
        $pattycash = number_format($pettysaldo, 0, ".", ".");

        // invoice
        $totalinvoice = Invoice::all()->count();
        
        return view('dashboard.index', compact('pattycash', 'totalinvoice','tampilmasuk','tampilkeluar'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
