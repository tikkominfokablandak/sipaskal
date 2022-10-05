<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Opd;
use App\Models\Unitkerja;
use App\Models\Jabatan;
use Hash;
use Validator;
use Alert;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;

class UserController extends Controller
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
                ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd')
                ->orderBy('id_role', 'desc')->get();
        
        return view('adminkab.users.index',
            [
            'user' => $user
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::orderBy('id', 'asc')->get();

        return view('adminkab.users.create', [
            'role' => $role
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $user = $request->all();

        if($request->file('foto') == NULL) {
            $user['foto'] = 'user.jpg';
        } else {
            $file = $request->file('foto');
            $path = base_path() . '/public/assets/img/profil';
            $nama = $user['username'];
            $extension = $file->getClientOriginalExtension();
            $namabaru = $nama . '.' . $extension;
            $file->move($path, $namabaru);
            
            $user['foto'] = $namabaru;
        }

        $user['username'] = Str::lower($request->username);
        $user['email'] = Str::lower($request->email);
        $user['password'] = Hash::make($request->password);

        User::create($user);

        alert()->success('Sukses','Data pengguna baru berhasil ditambahkan.');

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::join('roles','users.id_role','roles.id')
                ->join('jabatans','users.id_jabatan','jabatans.id')
                ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                ->join('opds','unitkerjas.id_opd','opds.id')
                ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                ->where('users.id',$id)
                ->first();
        
        return view('adminkab.users.detail',
            [
                'user' => $user
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::orderBy('id', 'asc')->get();

        $user = User::join('roles','users.id_role','roles.id')
                ->join('jabatans','users.id_jabatan','jabatans.id')
                ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                ->join('opds','unitkerjas.id_opd','opds.id')
                ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                ->where('users.id',$id)
                ->first();
        
        return view('adminkab.users.edit',
            [
                'role' => $role,
                'user' => $user,
                ]
            );
        }
        
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();

        $users = User::findOrfail($id);

        $user = $request->all();

        if($request->password == NULL) {
            $user['password'] = $users->password;
        } else {
            $user['password'] = Hash::make($request->password);
        }

        if($request->file('foto') == NULL) {
            $user['foto'] = $users->foto;
        } else {
            $file = $request->file('foto');
            $path = base_path() . '/public/assets/img/profil';
            $nama = $user['username'];
            $extension = $file->getClientOriginalExtension();
            $namabaru = $nama . '.' . $extension;
            $file->move($path, $namabaru);
            
            $user['foto'] = $namabaru;
        }

        $user['username'] = Str::lower($request->username);
        $user['email'] = Str::lower($request->email);

        $users->update($user);

        return redirect()->route('users.index')
                        ->with('success', 'Perubahan data berhasil di simpan.');
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

    public function select(Request $request)
    {
        $user = [];
        $unitkerjaID = $request->unitkerjaID;
        if ($request->has('q')) {
            $search = $request->q;
            $user = User::join('jabatans','users.id_jabatan','jabatans.id')
                ->select("id", "nama", "nama_jabatan")
                ->where('id_unitkerja', $unitkerjaID)
                ->Where('nama', 'LIKE', "%$search%")
                ->get();
        } else {
            $user = User::where('id_unitkerja', $unitkerjaID)->limit(10)->get();
        }
        return response()->json($user);
    }
}
