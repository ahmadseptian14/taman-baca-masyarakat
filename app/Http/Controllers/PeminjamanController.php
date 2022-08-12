<?php

namespace App\Http\Controllers;

// use App\Models\Peminjaman;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $peminjamans = Peminjaman::with(['user', 'buku'])->orderBy('created_at', 'DESC')->get();

        return view('pages.anggota.peminjaman.index', [
            'peminjamans' => $peminjamans
        ]);
    }

    public function pengurus()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])->orderBy('created_at', 'DESC')->get();

        return view('pages.pengurus.peminjaman.index', [
            'peminjamans' => $peminjamans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $buku = Buku::findOrFail($id);
        
        return view('pages.anggota.peminjaman.create', [
            'buku' => $buku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $buku = Buku::findOrFail($request->buku_id);

        Buku::where('id', $request->buku_id)->update([
            'stok' => $buku->stok - 1
        ]);
        
        $users_id = Auth::user()->id;
        $tgl_kembali = Carbon::now()->addDays(5)->format('Y-m-d');


        $request->merge(['tgl_kembali' => $tgl_kembali]);

        Peminjaman::create($request->all());


        Alert::success('Informasi Pesan!', 'Peminjaman Buku Berhasil ditambahkan');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with([
            'buku', 'user' 
        ])->findOrFail($id);

        return view('pages.anggota.peminjaman.detail',[
        'peminjaman' => $peminjaman
        ]);
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
