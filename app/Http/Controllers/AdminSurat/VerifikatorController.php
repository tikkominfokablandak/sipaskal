<?php

namespace App\Http\Controllers\AdminSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verifikator;
use Auth;

class VerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::join('roles','users.id_role','roles.id')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $verifikator = Verifikator::join('users', 'users.id', 'verifikators.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('verifikators.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        return view('adminsurat.daftar-verifikator.index', [
            'verifikator' => $verifikator,
            'user' => $user
        ]);
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
        $verifikator = $request->all();

        $verifikator['id_create'] = Auth::user()->id;

        Verifikator::create($verifikator);

        alert()->success('Sukses','Data verifikator baru berhasil ditambahkan.');

        return redirect('daftar-verifikator');
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
