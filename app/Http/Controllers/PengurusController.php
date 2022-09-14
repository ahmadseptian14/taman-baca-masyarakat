<?php

namespace App\Http\Controllers;

use App\Models\Tbm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penguruss = User::where('roles', 'PENGURUS')->orderBy('created_at', 'DESC')->get();
        
        return view('pages.admin.pengurus.index', [
            'penguruss' => $penguruss
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tbms = Tbm::all();

        return view('pages.admin.pengurus.create', [
            'tbms' => $tbms
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
        $request->validate([
            'tbm_id' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'roles' => 'required|string',
            'no_hp' => 'required'
            ]);
            
            $user = $request->all();
            
            // $roles = 'PENGURUS';

            $user = User::create([
            'tbm_id' => $request->tbm_id,
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            
            ]);
            
            Alert::success('Berhasil', 'Pengurus baru berhasil ditambahkan');
            return redirect()->route('pengurus.index');
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
