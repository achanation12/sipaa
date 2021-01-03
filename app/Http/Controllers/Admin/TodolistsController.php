<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Todolist;
use App\User;
use Illuminate\Http\Request;

class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolist = Todolist::orderBy('id', 'ASC')->paginate(5);

        return view('user.todolist.index')->with('todolist', $todolist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('user.todolist.tambah')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todolist = Todolist::create([
            'id_creator' => $request['creator'],
            'id_user' => $request['for'],
            'batas' => $request['batas'],
            'judul' => $request['judul'],
            'isi' => $request['isi'],
        ]);

        return redirect(route('root.todolist.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        $user = User::all();

        return view('user.todolist.edit')->with([
            'user' => $user,
            'todolist' => $todolist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $todolist->batas = $request->batas;
        $todolist->id_creator = $request->creator;
        $todolist->id_user = $request->for;
        $todolist->judul = $request->judul;
        $todolist->isi = $request->isi;
        $todolist->save();

        return redirect(route('root.todolist.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();

        return redirect(route('root.todolist.index'));
    }
}
