<?php

namespace App\Http\Controllers;

use App\Models\bukuanak;
use App\Models\bukuinduk;
use App\Models\jenis_denda;
use App\Models\kategori;
use App\Models\pegawai;
use App\Models\transaksi;
use Illuminate\Http\Request;
useApp\Http\Controllers\Carbon;
use Illuminate\Support\Facades\Session;

class dendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_denda = jenis_denda::all();
        $nip = pegawai::all();
        $transaksi = transaksi::all();
        return view('pegawai.peminjamanoffline', compact('jenis_denda','nip','transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $bukuAnak = bukuanak::find($request->id_buku_anak);
        // $bukuInduk = bukuinduk::find($bukuAnak->id_bukuinduk);
        // $kategori = kategori::where('id_kat', $bukuInduk->kategori)->first();
        // $waktuPeminjaman = $kategori->waktu_peminjaman;
        Session::flash('id_jenis_denda', $request->id_jenis_denda);
        $kategori = kategori::find($request->id_kat);
        $request->validate([
            'nis_nik.required'=>'Pilih NIS',
            'id_buku_anak.required'=>'Pilih ID Buku Anak',
        ]);
        $data=[
            'nis_nik'=> $request->input('nis_nik'),
            'id_buku_anak'=> $request->input('id_buku_anak'),
            'tgl_buku_kembali' => Carbon::now()->addDays($waktuPeminjaman),
            'tgl_peminjaman' => Carbon::now(),
        ];
       
        // $data->'tgl_buku_kembali' = Carbon::now()->addDays($kategori->waktu_peminjaman);
        transaksi::create($data);
        return redirect()->to('transaksi')->with('success','Berhasil menambahkan transaksi');
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
