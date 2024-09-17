<?php

namespace App\Http\Controllers;

use App\Models\bukuanak;
use App\Models\bukuinduk;
use App\Models\kategori;
use App\Models\rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuIndukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=bukuinduk::orderBy('id_bukuinduk','desc');
        dd($data);
        return view('pegawai.bukuinduk')->with('data',$data);
        
        // return view('pegawai.bukuinduk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $bukuInduk = bukuinduk::findOrFail($id);
        $bukuanak=bukuanak::all();
        $kategories = kategori::all();
        $raks = rak::all();
        return view('pegawai.bukuinduk.create', compact('kategories','raks','bukuanak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_bukuinduk', $request->id_bukuinduk);
        Session::flash('kategori', $request->kategori);
        Session::flash('rak', $request->rak);
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('tahun_terbit', $request->tahun_terbit);
        Session::flash('isbn', $request->isbn);
        Session::flash('jml_hal', $request->jml_hal);
        Session::flash('sinopsis', $request->sinopsis);
        Session::flash('stok', $request->stok);
        Session::flash('sampul', $request->sampul);
        Session::flash('harga', $request->harga);

        $request->validate([
            'id_bukuinduk.required'=>'ID wajib diisi',
            'kategori.required'=>'Kategori wajib diisi',
            'rak.required'=>'Rak wajib diisi',
            'id_bukuinduk.primary'=>'Id yang anda masukkan sudah terdaftar',
            'judul.required'=>'Judul wajib diisi',
            'penulis.required'=>'Penulis wajib diisi',
            'penerbit.required'=>'Penerbit wajib diisi',
            'tahun_terbit.required'=>'Tahun Terbit wajib diisi',
            'isbn.required'=>'ISBN wajib diisi',
            'jml_hal.required'=>'Jumlah Halaman wajib diisi',
            'sinopsis.required'=>'Sinopsis wajib diisi',
            'stok.required'=>'Stok wajib diisi',
            'sampul.required'=>'Foto Sampul wajib diisi',
            'harga.required'=>'Harga wajib diisi',
        ]);
        $data=[
            'id_bukuinduk'=> "B" . $request->id_bukuinduk,
            'kategori'=> $request->kategori,
            'rak'=> $request->rak,
            'judul'=> $request->judul,
            'penulis'=> $request->penulis,
            'penerbit'=> $request->penerbit,
            'tahun_terbit'=> $request->tahun_terbit,
            'isbn' => $request->isbn,
            'jml_hal'=> $request->jml_hal,
            'sinopsis' => $request->sinopsis,
            'stok'=> $request->stok,
            'sampul'=> $request->sampul,
            'harga'=> $request->harga,
        ];
        bukuinduk::create($data);
        return redirect()->to('bukuinduk')->with('success','Berhasil menambahkan Buku Induk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    // return view('buku_induk.show', compact('bukuInduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = bukuinduk::where('id_bukuinduk', $id)->first();
        $kategories = kategori::all();
        $raks = rak::all();
        // return view('pegawai.bukuinduk.create');

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Buku Induk tidak ditemukan'); // Or any other appropriate action
        }
    
        return view('pegawai.bukuinduk.edit', compact('kategories','raks'))->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori.required'=>'Kategori wajib diisi',
            'rak.required'=>'Rak wajib diisi',
            'judul.required'=>'Judul wajib diisi',
            'penulis.required'=>'Penulis wajib diisi',
            'penerbit.required'=>'Penerbit wajib diisi',
            'tahun_terbit.required'=>'Tahun Terbit wajib diisi',
            'isbn.required'=>'ISBN wajib diisi',
            'jml_hal.required'=>'Jumlah Halaman wajib diisi',
            'sinopsis.required'=>'Sinopsis wajib diisi',
            'stok.required'=>'Stok wajib diisi',
            'jumlah.required'=>'Jumlah wajib diisi',
            'sampul.required'=>'Foto Sampul wajib diisi',
            'harga.required'=>'Harga wajib diisi',
        ]);
        $data=[
            'kategori'=> $request->input('kategori'),
            'rak'=> $request->rak,
            'judul'=> $request->judul,
            'penulis'=> $request->penulis,
            'penerbit'=> $request->penerbit,
            'tahun_terbit'=> $request->tahun_terbit,
            'isbn' => $request->isbn,
            'jml_hal'=> $request->jml_hal,
            'sinopsis' => $request->sinopsis,
            'stok'=> $request->stok,
            'jumlah'=> $request->jumlah,
            'sampul'=> $request->sampul,
            'harga'=> $request->harga,
        ];
        bukuinduk::where('id_bukuinduk',$id)->update($data);
        return redirect()->to('bukuinduk')->with('success','Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        bukuinduk::where('id_bukuinduk',$id)->delete();
        return redirect()->to('bukuinduk')->with('success','Berhasil menghapus data');
    }
}
