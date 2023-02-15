<?php

namespace App\Http\Controllers;

use App\Models\Tbm;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users_id = Auth::user()->id;

        $bukus = Buku::with(['tbm', 'kategori'])
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('pages.admin.buku.index', [
            'bukus' => $bukus
        ]);
    }

    public function buku_pengurus() {
        // $buku = Buku::with(['tbm', 'kategori'])
        $bukus = Buku::with(['tbm', 'kategori'])
                        ->where('users_id', Auth::user()->id)
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('pages.pengurus.buku.index', [
            'bukus' => $bukus
        ]);
    }


    public function buku_anggota()
    {
        // $users_id = Auth::user()->id;

        $bukus = Buku::with(['tbm', 'kategori'])
                        ->orderBy('judul', 'ASC')
                        ->get();

        return view('pages.anggota.buku.index', [
            'bukus' => $bukus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tbm = Tbm::where('users_id', Auth::user()->id)->get();
        $kategoris = Kategori::all();

        return view('pages.pengurus.buku.create', [
            // 'tbm' => $tbm,
            'kategoris' =>$kategoris
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
        $users_id = Auth::user()->id;
        // $tbm_id = Tbm::where('users_id', Auth::user()->id)->get();

        $data = $request->all();

        $data['users_id'] = $users_id;
        $data['foto'] = $request->file('foto')->store('assets/buku', 'public');

        Buku::create($data);

        return redirect()->route('buku.pengurus');
    }

    public function tambah(Request $request, $id)
    {
        $sum = Buku::findOrFail($id);

        Buku::where('id', $id)->update([
            'stok_tersedia' => $sum->stok_tersedia + $request->stok_tersedia,
        ]);

        Alert::success('Informasi Pesan!', 'Buku berhasil di tambah');

        return redirect()->back();
    }

    public function kurang(Request $request, $id)
    {
        $sum = Buku::findOrFail($id);
        if ($request->stok_tersedia >= $sum->stok_tersedia) {
            Alert::error('Informasi Pesan!', 'Stok buku tidak boleh kurang dari 0');
        } else {
            Buku::where('id', $id)->update([
                'stok_tersedia' => $sum->stok_tersedia - $request->stok_tersedia,
            ]);
            Alert::success('Informasi Pesan!', 'Buku berhasil di kurang');
        }

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
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();

        return view('pages.pengurus.buku.edit', [
            'buku' => $buku,
            'kategoris' => $kategoris
        ]);
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
        $users_id = Auth::user()->id;
        // $tbm_id = Tbm::where('users_id', Auth::user()->id)->get();

        $data = $request->all();


        if ($request->hasFile('foto')) {
            $data['users_id'] = $users_id;
            $data['foto'] = $request->file('foto')->store('assets/buku', 'public');

            $item = Buku::findOrFail($id);
            $item->update($data);
            Alert::success('Berhasil', 'Buku berhasil di update');
        } else {
            $data['users_id'] = $users_id;
            // $data['foto'] = $request->file('foto')->store('assets/buku', 'public');

            $item = Buku::findOrFail($id);
            $item->update($data);
            Alert::success('Berhasil', 'Buku berhasil di update');

        }

        return redirect()->route('buku.pengurus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);


        $buku->delete();

        return redirect()->back()->with('message', 'Buku berhasil dihapus');
    }
}
