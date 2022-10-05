<?php

namespace App\Http\Controllers\AdminSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenissurat;
use App\Models\Tujuan;
use Auth;
use App\Models\Tembusan;
use App\Models\Verifikator;
use App\Models\Tandatangan;
use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratKeluar;
use LogSurat;
use App\Models\Log_surat;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminsurat.suratkeluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenissurat = Jenissurat::get();

        $internal = Tujuan::join('users', 'users.id', 'tujuans.id_internal')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tujuans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'INTERNAL')
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $tembusan = Tembusan::join('users', 'users.id', 'tembusans.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tembusans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tembusans.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $eksternal = Tujuan::where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'EKSTERNAL')
                        ->orderBy('tujuans.nama_tujuan', 'asc')
                        ->get();

        $verifikator = Verifikator::join('users', 'users.id', 'verifikators.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('verifikators.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $tandatangan = Tandatangan::join('users', 'users.id', 'tandatangans.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tandatangans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tandatangans.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        return view('adminsurat.suratkeluar.create', [
            'jenissurat' => $jenissurat,
            'internal' => $internal,
            'tembusan' => $tembusan,
            'eksternal' => $eksternal,
            'verifikator' => $verifikator,
            'tandatangan' => $tandatangan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratKeluarRequest $request)
    {
        $validated = $request->validated();

        $suratkeluar = new SuratKeluar;
        // $suratkeluar = $request->all();

            $file = $request->file('file_surat');
            $nama = 'sk-' . str_random(10);
            $extension = $file->getClientOriginalExtension();
            $namabaru = $nama . '.' . $extension;
            Storage::putFileAs('public/sk', $request->file('file_surat'), $namabaru);

        // $suratkeluar['file_surat'] = $namabaru;

        // $suratkeluar['tgl_surat'] = Carbon::now();
        // $suratkeluar['id_status'] = 1;
        // $suratkeluar['id_create'] = Auth::user()->id;
        // $suratkeluar['id_pengirim'] = Auth::user()->id;

        $suratkeluar

        $suratkeluar->file_surat = $namabaru;

        $suratkeluar->tgl_surat = Carbon::now();
        $suratkeluar->id_status = 1;
        $suratkeluar->id_create = Auth::user()->id;
        $suratkeluar->id_pengirim = Auth::user()->id;

        $suratkeluar->save();

        // SuratKeluar::create($suratkeluar);

        $id_sm = NULL;
        $id_sk = $suratkeluar->id;
        $id_tujuan = $suratkeluar->id_tujuan;
        $id_pengirim = $suratkeluar->id_create;
        $id_tembusan = $suratkeluar->id_tembusan;
        $id_verifikator = $suratkeluar->id_verifikator;
        $id_ttd = $suratkeluar->id_ttd;
        $id_disposisi = NULL;
        $id_status = 1;
        $read = "READ";
        $id_create = $suratkeluar->id_create;

        LogSurat::createLog($id_sm, $id_sk, $id_tujuan, $id_pengirim, $id_tembusan, $id_verifikator, $id_ttd, $id_disposisi, $id_status, $read, $id_create);

        alert()->success('Sukses','Data surat keluar baru berhasil disimpan.');

        return redirect('surat-keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
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
        //
    }
}
