<?php

namespace App\Http\Controllers\AdminSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tujuan;
use Auth;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internal = Tujuan::join('users', 'users.id', 'tujuans.id_internal')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tujuans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'INTERNAL')
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $eksternal = Tujuan::where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'EKSTERNAL')
                        ->orderBy('tujuans.nama_tujuan', 'asc')
                        ->get();

        return view('adminsurat.daftar-tujuan.index', [
            'internal' => $internal,
            'eksternal' => $eksternal,
        ]);
        
        return view('adminsurat.daftar-tujuan.index');
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
    public function storeInternal(Request $request)
    {
        $internal = $request->all();

        $internal['id_create'] = Auth::user()->id;
        $internal['jenis_tujuan'] = 'INTERNAL';

        Tujuan::create($internal);

        alert()->success('Sukses','Data tujuan internal baru berhasil ditambahkan.');

        return redirect('daftar-tujuan');
    }

    public function storeEksternal(Request $request)
    {
        $eksternal = $request->all();

        $eksternal['id_create'] = Auth::user()->id;
        $eksternal['jenis_tujuan'] = 'EKSTERNAL';

        Tujuan::create($eksternal);

        alert()->success('Sukses','Data tujuan eksternal baru berhasil ditambahkan.');

        return redirect('daftar-tujuan');
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
