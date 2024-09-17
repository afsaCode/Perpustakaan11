<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=kategori::orderBy('id_kat','desc')->get();
        return view('pegawai.kategori')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // dd($request);
        // kategori::create($request->all());
        Session::flash('id_kat', $request->id_kat);
        Session::flash('kategori', $request->kategori);
        Session::flash('waktu_peminjaman', $request->waktu_peminjaman);
        Session::flash('harga_keterlambatan', $request->harga_keterlambatan);

        $request->validate([
            'id_kat.required'=>'Id wajib diisi',
            'id_kat.primary'=>'Id yang anda masukkan sudah terdaftar',
            'kategori.required'=>'Kategori wajib diisi',
            'kategori.unique'=>'Kategori yang anda masukkan sudah terdaftar',
            'waktu_peminjaman.required'=>'Waktu peminjaman wajib diisi',
            'harga_keterlambatan.required'=>'Harga keterlambatan wajib diisi',
        ]);
        $data=[
            'id_kat'=> "K" . $request->id_kat,
            'kategori'=> $request->kategori,
            'waktu_peminjaman'=> $request->waktu_peminjaman,
            'harga_keterlambatan'=> $request->harga_keterlambatan,
        ];
        kategori::create($data);
        return redirect()->to('kategori')->with('success','Berhasil menambahkan kategori');
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
        $data = kategori::where('id_kat', $id)->first();

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Kategori tidak ditemukan'); // Or any other appropriate action
        }
    
        return view('pegawai.kategori.edit')->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori' => 'required',
            'waktu_peminjaman' => 'required',
            'harga_keterlambatan' => 'required',
        ],[
            'kategori.required'=>'Kategori wajib diisi',
            'kategori.unique'=>'Kategori yang anda masukkan sudah terdaftar',
            'waktu_peminjaman.required'=>'Waktu peminjaman wajib diisi',
            'harga_keterlambatan'=>'Harga keterlambatan wajib diisi',
        ]);
        $data=[
            'kategori'=> $request->kategori,
            'waktu_peminjaman'=> $request->waktu_peminjaman,
            'harga_keterlambatan'=> $request->harga_keterlambatan,
        ];
        kategori::where('id_kat',$id)->update($data);
        return redirect()->to('kategori')->with('success','Berhasil update data');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kategori::where('id_kat',$id)->delete();
        return redirect()->to('kategori')->with('success','Berhasil menghapus data');
    }
}
