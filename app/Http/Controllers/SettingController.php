<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        $waktu = Setting::where('id', 2)->first();
        // return $setting;
        return view('setting.index', [
            'setting' => $setting,
            'waktu' => $waktu
        ]);
    }
    public function edit($id)
    {
        $setting = Setting::find($id);
        // return $setting;
        return response()->json($setting);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();

        try {
            $setting = Setting::find($id);
            $setting->date = $request->date;
            $setting->time = $request->time;
            $setting->status = $request->status;

            $setting->save();

            DB::commit();
            $notification = array(
                'message' => 'Settingan Waktu Cek Kelulusan Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e . '',
            ], 500);
        }
    }

    public function waktu_ujian(Request $request)
    {
        $id = $request->id;
            DB::table('settings')->where('id', $id)->update([
                'menit' => $request->waktu * 60
            ]);

            $notification = array(
                'message' => 'Settingan Waktu Ujian Berhasil Diubah',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

    }
}
