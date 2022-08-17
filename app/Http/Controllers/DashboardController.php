<?php

namespace App\Http\Controllers;

use App\Models\Tbm;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $buku_pengurus = Buku::where('users_id', Auth::user()->id)->count();
        $buku = Buku::count();
        $peminjaman_pengurus = Peminjaman::where('buku_pengurus', Auth::user()->id)->count();
        $peminjaman = Peminjaman::count();
        $kategori = Kategori::count();
        $tbm = Tbm::count();
        $pengurus = User::where('roles', 'PENGURUS')->count();
        

        return view('pages.anggota.dashboard', [
            'buku_pengurus' => $buku_pengurus,
            'buku' => $buku,
            'peminjaman_pengurus' => $peminjaman_pengurus,
            'peminjaman' => $peminjaman,
            'kategori' => $kategori,
            'tbm' => $tbm,
            'pengurus' => $pengurus
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
        //
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
