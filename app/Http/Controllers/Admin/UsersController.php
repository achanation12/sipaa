<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('root.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $idusr = User::all('id_karyawan');
        $karyawan = Karyawan::all();

        $diff = $karyawan->diff(Karyawan::whereIn('id', $idusr)->get());
        return view('root.users.tambah')->with('karyawan', $diff);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'id_karyawan' => $request['karyawan'],
            'password' => Hash::make($request['password']),
        ]);

        $role = Role::select('id')->where('name', 'karyawan')->first();

        $user->roles()->attach($role);

        return redirect(route('root.users.index'))->with('message', 'Tambah Data User Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $idusr = User::all('id_karyawan');
        $roles = Role::all();
        $karya = Karyawan::all();

        $diff = $karya->diff(Karyawan::whereIn('id', $idusr)->get());

        return view('root.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
            'karya' => $diff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $id = $request->karyawan;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_karyawan = $request->karyawan;
        $user->save();

        $user->roles()->sync($request->roles);

        $karyawan = Karyawan::whereId($id)->update([
            'email' => $request['email'],
            'name' => $request['name'],
        ]);

        return redirect(route('root.users.index'))->with('message', 'Ubah Data User Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('root')){
            return redirect(route('home'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect(route('root.users.index'))->with('message', 'Hapus Data User Berhasil.');
    }
}
