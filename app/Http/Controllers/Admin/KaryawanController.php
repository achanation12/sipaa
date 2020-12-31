<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $karyawan = Karyawan::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'tempatlahir' => $request['tempatlahir'],
            'tanggallahir' => $request['tgllahir'],
            'jeniskelamin' => $request['jk'],
            'agama' => $request['agama'],
            'notelp' => $request['notelp'],
            'alamat' => $request['alamat'],
            'pendidikan' => $request['pendidikan']
        ]);

        return redirect(route('root.karyawan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
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
        $karyawan->name = $request->name;
        $karyawan->email = $request->email;
        $karyawan->tempatlahir = $request->tempatlahir;
        $karyawan->tanggallahir = $request->tgllahir;
        $karyawan->jeniskelamin = $request->jk;
        $karyawan->agama = $request->agama;
        $karyawan->notelp = $request->notelp;
        $karyawan->alamat = $request->alamat;
        $karyawan->pendidikan = $request->pendidikan;
        $karyawan->save();

        return redirect(route('root.karyawan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect(route('root.karyawan.index'));
    }
}
