<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SoalImport;
use App\Models\Pendaftar;
use App\Models\Soal;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;


class SoalController extends Controller
{
    public function index()
    {
        $soal = Soal::first();
        return view('soal.index', compact('soal'));
    }
    public function tinjau()
    {
        $soal = Soal::get();
        return view('soal.tinjau', compact('soal'));
    }
    public function import(Request $request)
    {
        Excel::import(new SoalImport, $request->file('file'));

        return redirect()->back();
    }
    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $pendaftar = Pendaftar::find($id)->first();
        $waktu = Setting::where('id', 2)->first();
        $soal = Soal::inRandomOrder()->get();
        return view('soal.show', compact('pendaftar', 'soal', 'waktu'));
    }
    public function submit(Request $request)
    {
        $jawaban = $request->jawaban;
        $id = Auth::user()->id;
        if($jawaban == null){
            DB::table('pendaftars')->where('user_id', $id)->update(['nilai_ujian' => 0]);
        return redirect('/dashboard');
        }
        $soal = $request->no;
        $z = null;
        foreach ($jawaban as $value => $item) {
            $db = DB::table('soals')->where('jawaban_benar', '=', $item)
                ->where('id', $soal[$value])
                ->exists();
            $nilai = DB::table('soals')->where('jawaban_benar', '=', $item)
                ->where('id', $soal[$value])->first();
            if ($db == true) {
                $z += $nilai->bobot_nilai;
            } else {
                $z += 0;
            }
        }
        DB::table('pendaftars')->where('user_id', $id)->update(['nilai_ujian' => $z]);
        return redirect('/dashboard');
    }
    public function importNilai(Request $request)
    {
        Excel::import(new NilaiImport, $request->file('file'));

        $notification = [
            'message' => 'Soal Ujian Berhasil Diimport',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function hapusSoal()
    {
        DB::table('soals')->delete();
        $notification = [
            'message' => 'Soal Ujian Berhasil Dihapus',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

}