<?php

namespace App\Http\Controllers;

use App\Models\bukuanak;
use App\Models\bukuinduk;
use App\Models\jenis_denda;
use App\Models\kategori;
use App\Models\Member;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=transaksi::orderBy('id_transaksi','desc')->get();
        return view('pegawai.peminjamanoffline')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_bukuinduk = bukuinduk::all();
        $id_buku_anak = bukuanak::all();
        $nis_nik = Member::all();
        return view('pegawai.peminjamanoffline.create', compact('id_buku_anak','nis_nik','id_bukuinduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bukuAnak = bukuanak::find($request->id_buku_anak);
        $bukuInduk = bukuinduk::find($bukuAnak->id_bukuinduk);
        $kategori = kategori::where('id_kat', $bukuInduk->kategori)->first();
        $waktuPeminjaman = $kategori->waktu_peminjaman;
        Session::flash('nis_nik', $request->nis_nik);
        Session::flash('id_buku_anak', $request->id_buku_anak);
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
    public function edit(string $id, Request $request)
    {
        
        $data = transaksi::where('id_transaksi', $id)->first();
        $jenis_denda = jenis_denda::all();
        // return view('pegawai.bukuinduk.create');

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan'); // Or any other appropriate action
        }
    
        return view('pegawai.peminjamanoffline', compact('jenis_denda'))->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $transaksi)
    {
        Session::flash('tgl_pengembalian', $request->tgl_pengembalian);
        
        $request->validate([
            'tgl_pengembalian.required'=>'Tanggal Pengembalian wajib diisi',
        ]);
        $data=[
            'tgl_pengembalian'=> $request->tgl_pengembalian,
        ];
        bukuinduk::where('id_bukuinduk',$id)->update($data);
        return redirect()->to('bukuinduk')->with('success','Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
