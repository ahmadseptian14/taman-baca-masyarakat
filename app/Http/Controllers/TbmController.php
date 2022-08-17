<?php

namespace App\Http\Controllers;

use App\Models\Tbm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TbmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbms = Tbm::all();

        return view('pages.admin.tbm.index', [
            'tbms' => $tbms
        ]);
    }

    public function tbm_anggota()
    {
        $tbms = Tbm::all();

        return view('pages.anggota.tbm.index', [
            'tbms' => $tbms
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penguruss = User::where('roles', 'PENGURUS')->get();

        return view('pages.admin.tbm.create', [
            'penguruss' => $penguruss
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

        
        $data = $request->all();

        Tbm::create($data);

        return redirect()->route('tbm.index');
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
        $tbm = Tbm::findOrFail($id);

        $tbm->delete();

        return redirect()->back();
    }
}
