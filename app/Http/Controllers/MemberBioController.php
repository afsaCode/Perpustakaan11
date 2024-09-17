<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MemberBioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.member');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Member::create($request->all());
        Session::flash('nis_nik', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('telp', $request->telp);
        Session::flash('jk', $request->jk);

        $request->validate([
            'nis_nik' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'jk' => 'required',
        ],[
            'nis_nik.required'=>'NIS wajib diisi',
            'nis_nik.primary'=>'NIS yang anda masukkan sudah terdaftar',
            'nama.required'=>'Nama wajib diisi',
            'telp.required'=>'No Telepon wajib diisi',
            'jk.required'=>'Pilih jenis kelamin',
        ]);
        $data=[
            'nis_nik'=>$request->nis_nik,
            'id_user'=>$request->id_user,
            'nama'=>$request->nama,
            'telp'=>$request->telp,
            'jk'=>$request->jk,
        ];
        Member::create($data);
        return redirect()->to('home')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
