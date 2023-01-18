<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Setting;
use App\Models\Kampus;
use Carbon\Carbon;
use PDF;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function daftar()
    {
        return view('landing.daftar');
    }
    public function cek(Request $request)
    {
        $req_search = $request->query('search');
        $pendaftar = Pendaftar::all();
        $setting = Setting::first();
        $dt = Carbon::now()->format('Y-m-d H:i:s');

        if ($req_search != null) {
            $pendaftar = Pendaftar::query()->where('no_reg', $req_search)->with('jurusan')->get();
        }

        return view('ceklulus.cek', [
            'pendaftar' => $pendaftar,
            'setting' => $setting,
            'req_search' => $req_search,
            'dt' => $dt,
        ]);
    }
    public function cetak($id)
    {
        $pendaftar = Pendaftar::find($id);
        $kampuses = Kampus::where('id', 1)->first();
        // return view('ceklulus.cetak', compact('pendaftar', 'kampuses'));
        $pdf = PDF::loadView('ceklulus.cetak', compact('pendaftar', 'kampuses'));
        // , [
        //     'pendaftar' => $pendaftar,
        //     'kampuses' => $kampuses
        // ]);
        return $pdf->download('Surat Keterangan Lulus.pdf');
    }
    
}
