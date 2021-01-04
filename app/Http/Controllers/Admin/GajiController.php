<?php

namespace App\Http\Controllers\Admin;

use App\Gaji;
use App\Karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::orderBy('id', 'ASC')->paginate(5);
        return view('admin.gaji.index')->with('gaji', $gaji);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idgj = Gaji::all('id_karyawan');
        $karyawan = Karyawan::all();

        $diff = $karyawan->diff(Karyawan::whereIn('id', $idgj)->get());
        return view('admin.gaji.tambah')->with('diff', $diff);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gaji = Gaji::create([
            'gajibln' => $request['gajibln'],
            'gajibonus' => $request['gajibonus'],
            'gajilembur' => $request['gajilembur'],
            'gajitotal' => $request['gajitotal'],
            'id_karyawan' => $request['id_karyawan'],
        ]);

        return redirect(route('root.gaji.index'))->with('message', 'Tambah Data Gaji Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        $idgj = Gaji::all('id_karyawan');
        $karyawan = Karyawan::all();

        $diff = $karyawan->diff(Karyawan::whereIn('id', $idgj)->get());
        return view('admin.gaji.edit')->with([
            'gaji' => $gaji,
            'diff' => $diff
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        $gaji->gajibln = $request->gajibln;
        $gaji->gajibonus = $request->gajibonus;
        $gaji->gajilembur = $request->gajilembur;
        $gaji->gajitotal = $request->gajitotal;
        $gaji->id_karyawan = $request->id_karyawan;
        $gaji->save();

        return redirect(route('root.gaji.index'))->with('message', 'Ubah Data Gaji Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();

        return redirect(route('root.gaji.index'))->with('message', 'Hapus Data Gaji Berhasil.');
    }
}
