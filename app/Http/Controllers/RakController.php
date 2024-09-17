<?php

namespace App\Http\Controllers;

use App\Models\rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=rak::orderBy('id_rak','desc')->get();
        return view('pegawai.rak')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.rak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request);
        // kategori::create($request->all());
        Session::flash('id_rak', $request->id_rak);
        Session::flash('rak', $request->rak);

        $request->validate([
            'id_rak.required'=>'Id wajib diisi',
            'id_rak.primary'=>'Id yang anda masukkan sudah terdaftar',
            'rak.required'=>'Rak wajib diisi',
            'rak.unique'=>'Rak yang anda masukkan sudah terdaftar',
        ]);
        $data=[
            'id_rak'=> "R" . $request->id_rak,
            'rak'=> $request->rak,
        ];
        rak::create($data);
        return redirect()->to('rak')->with('success','Berhasil menambahkan kategori');
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
        $data = rak::where('id_rak', $id)->first();

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Rak tidak ditemukan'); // Or any other appropriate action
        }
    
        return view('pegawai.rak.edit')->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rak' => 'required',
        ],[
            'rak.required'=>'Rak wajib diisi',
            'rak.unique'=>'Rak yang anda masukkan sudah terdaftar',
        ]);
        $data=[
            'rak'=> $request->rak,
        ];
        rak::where('id_rak',$id)->update($data);
        return redirect()->to('rak')->with('success','Berhasil update data');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rak::where('id_rak',$id)->delete();
        return redirect()->to('rak')->with('success','Berhasil menghapus data');
    }
}
