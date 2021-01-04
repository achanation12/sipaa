<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        $karyawan = Karyawan::orderBy('id', 'asc')->paginate(5);
        return view('admin.karyawan.index')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        return view('admin.karyawan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        $karyawan = Karyawan::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'tempatlahir' => $request['tempatlahir'],
            'tanggallahir' => $request['tgllahir'],
            'jeniskelamin' => $request['jk'],
            'agama' => $request['agama'],
            'notelp' => $request['notelp'],
            'alamat' => $request['alamat']
        ]);

        return redirect(route('root.karyawan.index'))->with('message', 'Tambah Data Karyawan Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('admin.karyawan.detail')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        return view('admin.karyawan.edit')->with('karyawan', $karyawan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        $id = $karyawan->id;

        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->tempatlahir = $request->tempatlahir;
        $karyawan->tanggallahir = $request->tgllahir;
        $karyawan->jeniskelamin = $request->jk;
        $karyawan->agama = $request->agama;
        $karyawan->notelp = $request->notelp;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        $user = User::where('id_karyawan', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return redirect(route('root.karyawan.index'))->with('message', 'Ubah Data Karyawan Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        if (Gate::denies('rootadmin')){
            return redirect(route('home'));
        }

        $karyawan->delete();

        return redirect(route('root.karyawan.index'))->with('message', 'Hapus Data Karyawan Berhasil.');
    }
}
