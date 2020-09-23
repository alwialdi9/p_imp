<?php

namespace App\Http\Controllers;


use App\Surat;
use App\Petty;
use App\kategori_surat;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\SendRequest;
use PhpParser\Builder\Function_;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = Surat::all();
        $surat_id = Surat::orderBy('id', 'desc')->first();
        $kategori_surat = kategori_surat::all();
        $masuk = Surat::where('jenis', 'masuk')->count();
        $keluar = Surat::where('jenis', 'keluar')->count();
        $jumlah = Surat::all()->count();
        $petty = Petty::all();
        return view('surat.index', compact('surat', 'kategori_surat', 'masuk', 'keluar', 'jumlah', 'surat_id', 'petty'));
        // return view('surat.index', compact('surat','masuk','keluar','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nampilgambar = True;
        $surat = Surat::all();
        $surat_id = Surat::orderBy('id', 'desc')->first();
        $kategori_surat = kategori_surat::all();
        $nomor = Surat::orderBy('id', 'desc')->first();
        if ($nomor || $surat_id) {
            $id = $surat_id->id;
            $no = substr($nomor->nomor_surat, 0, 3) + 1;
            $nomornya = sprintf("%03d", $no);
        } else {
            $id = '001';
            $nomornya = '001';
        }
        // dd($nomor,$no, $nomornya);

        return view('surat.suratmasuk', compact('nampilgambar', 'kategori_surat', 'surat', 'id', 'nomornya'));
    }

    public function createkeluar()
    {
        //
        $nampilgambar = True;
        $surat = Surat::all();
        $surat_id = Surat::orderBy('id', 'desc')->first();
        // $id = $surat_id->id;
        $kategori_surat = kategori_surat::all();
        $nomor = Surat::orderBy('id', 'desc')->first();
        if ($nomor || $surat_id) {
            $id = $surat_id->id;
            $no = substr($nomor->nomor_surat, 0, 3) + 1;
            $nomornya = sprintf("%03d", $no);
        } else {
            $id = '001';
            $nomornya = '001';
        }
        return view('surat.suratkeluar', compact('nampilgambar', 'kategori_surat', 'surat', 'id', 'nomornya'));
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
        $file = $request->file('filesurat');

        $nama_file = $file->getClientOriginalName();

        $file->move(public_path('file'), $nama_file);

        Validator::make($request->all(), [
            'jenis' => 'required',
            'kategori_id' => 'required|numeric',
            'nomor_surat' => 'required',
            'tanggal_terima' => 'required',
            'tanggal_surat' => 'required',
            'asal_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'surat_path' => 'required|mimes:pdf,xlx,csv,doc,docx,jpg,png,jpeg|max:2048',
        ]);

        function getRomawi($bln)
        {
            switch ($bln) {
                case '01':
                    return "I";
                    break;

                case '02':
                    return "II";
                    break;

                case '03':
                    return "III";
                    break;

                case '04':
                    return "IV";
                    break;

                case '05':
                    return "V";
                    break;

                case '06':
                    return "VI";
                    break;

                case '07':
                    return "VII";
                    break;

                case '08':
                    return "VIII";
                    break;

                case '09':
                    return "IX";
                    break;

                case '10':
                    return "X";
                    break;

                case '11':
                    return "XI";
                    break;

                case '12':
                    return "XII";
                    break;
            }
        }

        function kategori($kategori)
        {
            switch ($kategori) {
                case 'Faktur':
                    return "FK";
                    break;

                case 'Penawaran Harga':
                    return "PH";
                    break;

                case 'Kwitansi':
                    return "KW";
                    break;

                case 'Memorandum of Understanding':
                    return "MOU";
                    break;

                case 'Permintaan':
                    return "PM";
                    break;

                case 'Keterangan':
                    return "KET";
                    break;

                case 'Penerimaan Magang':
                    return "PM";
                    break;
            }
        }

        $date1 = substr($request->tanggal_surat, 0, 10);
        $date2 = substr($request->tanggal_surat, 13, 10);
        $tahun = substr($date1, 0, 4);
        $bulan = substr($date1, 5, 2);
        $romawi = getRomawi($bulan);

        // $singkatan = getKategori

        // $nomor = Surat::orderBy('id', 'desc')->first();
        // $no = substr($nomor->nomor_surat, 0, 3) + 1;
        // $nomornya = sprintf("%03s", $no);
        // // $no = $data['maxKode'];
        // // $noUrut = $no + 1;

        // $nomor_surat = $nomornya . "/" . $request->jenis_surat . "/" . $request->asal_surat . "/" . $romawi . "/" . $tahun;
        // dd($bulan, $tahun, $date1, $date2, $romawi, $nomor_surat);
        if ($request->jenis == "masuk") {
            Surat::create([
                'jenis' => $request->jenis,
                'kategori_id' => $request->jenis_surat,
                'nomor_surat' => $request->nomor_surat,
                'tanggal_terima' => $date1,
                'tanggal_surat' => $date2,
                'asal_surat' => $request->asal_surat,
                'tujuan_surat' => '',
                'perihal' => $request->perihal,
                'surat_path' => $nama_file,
            ]);
        } else {
            Surat::create([
                'jenis' => $request->jenis,
                'kategori_id' => $request->jenis_surat,
                'nomor_surat' => $request->nomor_surat,
                'tanggal_terima' => '',
                'tanggal_surat' => $date1,
                'asal_surat' => '',
                'tujuan_surat' => $request->tujuan_surat,
                'perihal' => $request->perihal,
                'surat_path' => $nama_file,
            ]);
            return redirect('/surat');
        }
        return redirect('/surat');
        $surat = Surat::all();
        $kategori_surat = kategori_surat::all();
        $masuk = Surat::where('jenis', 'Masuk')->count();
        $keluar = Surat::where('jenis', 'Keluar')->count();
        $jumlah = Surat::all()->count();
        $petty = Petty::all();

        // return view('surat.index', compact('surat', 'kategori_surat', 'masuk', 'keluar', 'jumlah', 'petty'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date1 = substr($request->search, 0, 10);
        $date2 = substr($request->search, 13, 10);
        $surat = DB::table('surat')
            ->whereBetween('tanggal_terima', [$date1, $date2])
            ->get();

        $masuk = DB::table('surat')
            ->whereBetween('tanggal_terima', [$date1, $date2])
            ->where(function ($query) {
                $query->where('jenis', '=', 'masuk');
            })
            ->count();

        // dd($masuk);
        $keluar = DB::table('surat')
            ->whereBetween('tanggal_terima', [$date1, $date2])
            ->where(function ($query) {
                $query->where('jenis', '=', 'keluar');
            })
            ->count();

        $jumlah = DB::table('surat')
            ->whereBetween('tanggal_terima', [$date1, $date2])
            ->count();
        ##############################################################

        $surat_id = Surat::orderBy('id', 'desc')->first();
        $kategori_surat = kategori_surat::all();
        $petty = Petty::all();
        return view('surat.index', compact('surat', 'kategori_surat', 'masuk', 'keluar', 'jumlah', 'surat_id', 'petty'));
        #############################################################

        return view('petty.index', compact('petty', 'masuk', 'keluar', 'jumlah', 'saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = DB::table('surat')->where('id', $id)->get();
        $kategori_surat = kategori_surat::all();
        return view('surat.edit', ['surat' => $surat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('surat')->where('id', $request->id)->update([
                'jenis' => $request->jenis,
                'kategori_id' => $request->jenis_surat,
                'nomor_surat' => $request->nomor_surat,
                'tanggal_terima' => $date1,
                'tanggal_surat' => $date2,
                'asal_surat' => $request->asal_surat,
                'tujuan_surat' => '',
                'perihal' => $request->perihal,
                'surat_path' => $nama_file,
        ]);
        return redirect('/surat');
        $surat = Surat::all();
        $kategori_surat = kategori_surat::all();
        $masuk = Surat::where('jenis', 'Masuk')->count();
        $keluar = Surat::where('jenis', 'Keluar')->count();
        $jumlah = Surat::all()->count();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::where('id', $id)->delete();
        return redirect('/surat');
    }
}
