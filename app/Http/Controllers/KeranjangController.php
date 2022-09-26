<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KeranjangController extends Controller
{
    public function index() 
    {   

        $keranjangs = Keranjang::with(['buku', 'user'])->where('users_id', Auth::user()->id)->get();
        return view('pages.anggota.keranjang.index', [
            'keranjangs' => $keranjangs
        ]);  

    }


    public function add(Request $request, $id)
    {
        $buku = Buku::where('id', $id)->first();

        $data = [
            'buku_id' => $id,
            'users_id' => Auth::user()->id,
            'jumlah_pinjam' => $request->jumlah_pinjam,
        ];

        Keranjang::create($data);

        Alert::success('Informasi Pesan!', 'Buku Berhasil ditambahkan ke keranjang');
        
        return redirect()->route('keranjang.index');
    }


    public function destroy($id) 
    {
        $keranjang = Keranjang::findOrFail($id);

        $keranjang->delete();
 
        return redirect()->route('keranjang.index');
    }

}
