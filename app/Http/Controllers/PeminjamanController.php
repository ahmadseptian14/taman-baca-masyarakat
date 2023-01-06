<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Keranjang;
use Midtrans\Config;
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
        // $peminjamans = Peminjaman::with(['user', 'buku'])
        //     ->where('users_id', Auth::user()->id)
        //     // ->whereIn('status_peminjaman', ['Belum di Verifikasi', 'Buku sudah bisa di ambil'])
        //     ->orderBy('created_at', 'DESC')
        //     ->get();

        $peminjamans = Peminjaman::with(['user', 'buku.tbm'])
                        ->where('users_id', Auth::user()->id)
                        ->whereIn('status_peminjaman', ['Belum diverifikasi', 'Buku sudah bisa di ambil'])
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('pages.anggota.peminjaman.index', [
            'peminjamans' => $peminjamans
        ]);
    }

    public function pengurus()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])
                    ->where('pengurus_id', Auth::user()->id)
                    ->whereIn('status_peminjaman', ['Belum diverifikasi', 'Buku sudah bisa di ambil'])
                    ->orderBy('created_at', 'DESC')
                    ->get();
                    // dd($peminjamans);
        return view('pages.pengurus.peminjaman.index', [
            'peminjamans' => $peminjamans
        ]);
    }


    public function riwayat()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])
            ->where('pengurus_id', Auth::user()->id)
            ->whereIn('status_peminjaman', ['Buku sudah dikembalikan'])
            ->orderBy('created_at', 'DESC')
            ->get();


        return view('pages.pengurus.peminjaman.riwayat', [
            'peminjamans' => $peminjamans
        ]);
    }


    public function riwayat_anggota()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])
                        ->where('users_id', Auth::user()->id)
                        ->whereIn('status_peminjaman', ['Buku sudah dikembalikan'])
                        ->orderBy('created_at', 'DESC')
                        ->get();


        return view('pages.anggota.peminjaman.riwayat', [
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


    public function pay()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'SB-Mid-server-GZM6z4C6EIUf-kEaRT_ATI-C';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 1000,
            ),
            'customer_details' => array(
                'first_name' => 'Ridho',
                'last_name' => 'Pratama',
                'email' => 'ridhopratama@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return view('pages.anggota.peminjaman.pay', [
            'snapToken' => $snapToken
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

        $keranjangs = Keranjang::with(['buku', 'user'])->where('users_id', Auth::user()->id)->get();

        $jumlahPinjam = Keranjang::where('users_id', Auth::user()->id)->sum('jumlah_pinjam');

        // $kode_peminjaman = 'Kadigi-' . mt_rand(000000, 999999);
        // if ($request->all() >= 100 ) {

        // }
        foreach ($keranjangs as $keranjang) {
            Peminjaman::create([
                'users_id' => Auth::user()->id,
                'pengurus_id' => $keranjang->buku->users_id,
                'buku_id' => $keranjang->buku->id,
                'kode_peminjaman' => 'Kadigi-' . mt_rand(000000, 999999),
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
                'jumlah_pinjam' => $jumlahPinjam,
                'status_peminjaman' => 'Belum diverifikasi'
            ]);

            $buku = Buku::where('id', $keranjang->buku_id)->first();
            $buku->stok_tersedia = $buku->stok_tersedia - $keranjang->jumlah_pinjam;
            $buku->stok_pinjam = $buku->stok_pinjam + $keranjang->jumlah_pinjam;
            $buku->update();

        }

        Keranjang::where('users_id', Auth::user()->id)->delete();

        Alert::success('Informasi Pesan!', 'Peminjaman Buku Berhasil ditambahkan');
        return redirect()->route('peminjaman.pay');
    }


    public function verifikasi($id)
    {

        Peminjaman::findOrFail($id)->update([
            'status_peminjaman' => 'Buku sudah bisa di ambil',
        ]);

        Alert::success('Berhasil', 'Update status peminjaman berhasil');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Anggota
    public function show($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $detailPeminjamans = DetailPeminjaman::with(['peminjaman.user', 'buku.tbm'])
            ->whereIn('status_peminjaman', ['Belum di Verifikasi', 'Buku sudah bisa di ambil'])
            ->get();

        return view('pages.anggota.peminjaman.detail', [
            'detailPeminjamans' => $detailPeminjamans
        ]);
    }

    // Pengurus
    public function detail_peminjaman($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $detailPeminjamans = DetailPeminjaman::with(['peminjaman.user', 'buku.tbm'])
            ->where('pengurus_id', Auth::user()->id)
            ->whereIn('status_peminjaman', ['Belum di Verifikasi', 'Buku sudah bisa di ambil'])
            ->get();

        return view('pages.pengurus.peminjaman.detail', [
            'detailPeminjamans' => $detailPeminjamans
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
        $peminjaman = Peminjaman::findOrFail($id);

        return view('pages.pengurus.peminjaman.edit', [
            'peminjaman' => $peminjaman
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
        Peminjaman::findOrFail($id)->update([
            'tgl_kembali' => request('tgl_kembali')
        ]);

        Alert::success('Informasi Pesan!', 'Peminjaman Berhasil diupdate');

        return redirect()->route('peminjaman.pengurus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->delete();

        Alert::success('Informasi Pesan!', 'Peminjaman berhasil dihapus');

        return redirect()->back();
    }

    public function retur_buku($id)
    {
        Peminjaman::findOrFail($id)->where('status_peminjaman', 'Buku sudah bisa di ambil')->update([
            'status_peminjaman' => 'Buku sudah dikembalikan',
        ]);

        // $detailPeminjamans = DetailPeminjaman::with(['buku', 'user'])->where('peminjaman_id', $id)->get();
        $data = Peminjaman::findOrFail($id);
        $sum = Buku::findOrFail($data->buku_id);

            Buku::where('id', $data->buku_id)->update([
                'stok_tersedia' => $sum->stok_tersedia + $data->jumlah_pinjam,
                'stok_pinjam' => $sum->stok_pinjam - $data->jumlah_pinjam,
            ]);

        Alert::success('Informasi Pesan!', 'Peminjaman Buku berhasil di Kembalikan');

        return back();
    }
}
