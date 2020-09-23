<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = Akun::orderBy('kode_akun', 'asc')->get();
        $totalakun = Akun::all()->count();
        return view('akun.index', compact('akun', 'totalakun'));
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
        // dd($request->all());
        $this->validate(request(), [
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'kategori_akun' => 'required',

        ]);
        if ($request->id == null) {
            Akun::create([
                'kode_akun' => $request->get('kode_akun'),
                'nama_akun' => $request->get('nama_akun'),
                'kategori_akun' => $request->get('kategori_akun'),
            ]);
            $status = 'Account Saved Successfully.';
        } else {
            Akun::where('id', '=', $request->id)->update([
                'kode_akun' => $request->get('kode_akun'),
                'nama_akun' => $request->get('nama_akun'),
                'kategori_akun' => $request->get('kategori_akun'),
            ]);
            $status = 'Account Update Successfully.';
        }

        return response()->json(['success' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 1) {
            $kategori = "Kas & Bank";
        } elseif ($id == 2) {
            $kategori = "Akun Piutang";
        } elseif ($id == 3) {
            $kategori = "Aktiva Tetap";
        } elseif ($id == 4) {
            $kategori = "Aktiva Lancar";
        } elseif ($id == 5) {
            $kategori = "Akun Hutang";
        } elseif ($id == 6) {
            $kategori = "Kewajiban Jangka Panjang";
        } elseif ($id == 7) {
            $kategori = "Ekuitas";
        } elseif ($id == 8) {
            $kategori = "Pendapatan";
        } elseif ($id == 9) {
            $kategori = "Beban Usaha";
        } elseif ($id == 10) {
            $kategori = "Beban";
        }

        $akun = Akun::where('kategori_akun', $kategori)->get();
        $totalakun = Akun::where('kategori_akun', $kategori)->count();
        return view('akun.index', compact('akun', 'totalakun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $akun = Akun::where($where)->first();

        return response()->json($akun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Akun::where('id', $id)->delete();
        return redirect('/akun');
    }
}
