<?php

namespace App\Http\Controllers;


use App\Models\bukuinduk;
use App\Models\kategori;
use App\Models\rak;
use App\Models\bukuanak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = bukuanak::orderBy('id', 'desc')->with('bukuInduk')->get();
        return view('pegawai.bukuanak')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $id_bukuinduks = bukuinduk::all();
        // dd($id_bukuinduks);
        return view('pegawai.bukuanak.create', compact('id_bukuinduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_bukuinduk', $request->id_bukuinduk);
        Session::flash('id', $request->id);
        Session::flash('status', $request->status);

        $request->validate([
            'id_bukuinduk.required' => 'Pilih ID Buku Induk',
            'id.required' => 'ID wajib diisi',
            'id.primary' => 'ID yang anda masukkan sudah terdaftar',
            'status.required' => 'Pilih Status',
        ]);
        $data = [
            'id_bukuinduk' => $request->input('id_bukuinduk'),
            'id' => $request->id_bukuinduk . "-" . $request->id,
            // 'id'=> $request->id,
            'status' => $request->status,
        ];
        $bukuInduk = BukuInduk::where('id_bukuinduk', $request->id_bukuinduk)->first();
        // dd($bukuInduk);
        $bukuanak = bukuanak::create($data);
        $bukuInduk->jumlah += 1;
        $bukuInduk->save();

        // Update jumlah buku di buku induk

        // $bukuInduk->load('bukuanak');
        // $bukuInduk->jumlah = $bukuInduk->bukuanak()->count();
        // $bukuInduk->save();
        return redirect()->to('bukuanak')->with('success', 'Berhasil menambahkan Buku Anak');
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
        $data = bukuanak::where('id', $id)->first();
        $id_bukuinduks = bukuinduk::all();

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Buku Anak tidak ditemukan'); // Or any other appropriate action
        }

        return view('pegawai.bukuanak.edit', compact('id_bukuinduks'))->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status.required' => 'Pilih Status',
        ]);
        $data = [
            'status' => $request->status,
        ];
        bukuanak::where('id', $id)->update($data);
        return redirect()->to('bukuanak')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        bukuanak::where('id', $id)->delete();
        return redirect()->to('bukuanak')->with('success', 'Berhasil menghapus data');
    }
}
