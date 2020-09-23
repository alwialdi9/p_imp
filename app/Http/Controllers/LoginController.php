<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Dasboard;
use App\Petty;
use App\Invoice;
use App\Pbiaya;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('login');
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

            return view('dashboard.index', compact('pattycash', 'totalinvoice', 'tampilmasuk', 'tampilkeluar'));
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email', $email)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('level', $data->level);
                Session::put('login', TRUE);
                return redirect('dashboard');
                
            } else {
                Session::flash('alert', 'Password Salah !');
                return redirect('login')->withInput(
                    $email = $request->old('email')
                );
            }
        } else {
            Session::flash('alert', 'Email Tidak Terdaftar!! Hubungi Admin');
            return redirect('login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('logout', 'Kamu sudah logout');
    }

    public function register(Request $request)
    {
        if (Session::get('level') == 'admin') {
            return view('auth.register');
        } else {
            return redirect('dashboard')->with('alert', 'Silahkan Hubungi Admin untuk menambahkan user baru');
        }
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'telepon' => 'required|numeric',
            'level' => 'required',
            'password-confirm' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        return redirect('dashboard')->with('alert-success', 'Kamu berhasil tambah data');
    }
}
