<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $total = Pelanggan::all()->count();
        return view('pelanggan.index', compact('pelanggan', 'total'));
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
        $this->validate(request(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'faksimile' => 'required',
            'instansi' => 'required',
            'alamat' => 'required',

        ]);
        
        if ($request->id == null) {
            Pelanggan::create([
                'nama_lengkap' => $request->get('nama_lengkap'),
                'email' => $request->get('email'),
                'telepon' => $request->get('telepon'),
                'faksimile' => $request->get('faksimile'),
                'instansi' => $request->get('instansi'),
                'alamat' => $request->get('alamat'),
            ]);
            $status = 'Customer Saved Successfully.';
        } else {
            Pelanggan::where('id', '=', $request->id)->update([
                'nama_lengkap' => $request->get('nama_lengkap'),
                'email' => $request->get('email'),
                'telepon' => $request->get('telepon'),
                'faksimile' => $request->get('faksimile'),
                'instansi' => $request->get('instansi'),
                'alamat' => $request->get('alamat'),
            ]);
            $status = 'Customer Update Successfully.';
        }

        return response()->json(['success' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
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
        $pelanggan = Pelanggan::where($where)->first();
        // dd($pelanggan);

        return response()->json($pelanggan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::where('id', $id)->delete();
        return redirect('/pelanggan');
    }
}
