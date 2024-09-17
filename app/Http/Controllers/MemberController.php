<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Member::orderBy('nis_nik','desc')->get();
        return view('pegawai.member')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $id_users = User::where('id_user', '!=', Auth::user()->id_user)->get();
        // $id_users = User::all();
        return view('pegawai.member.create');
        // return view('pegawai.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Member::create($request->all());
        Session::flash('nis_nik', $request->nis);
        Session::flash('id_user', $request->id_user);
        Session::flash('nama', $request->nama);
        Session::flash('telp', $request->telp);
        Session::flash('status', $request->status);
        Session::flash('jk', $request->jk);
        Session::flash('foto', $request->foto);

        $request->validate([
            'nis_nik' => 'required',
            // 'id_user' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'foto'=>'required',
        ],[
            'nis_nik.required'=>'NIS wajib diisi',
            'nis_nik.primary'=>'NIS yang anda masukkan sudah terdaftar',
            'id_user.required'=>'Pilih ID User',
            'id_user.primary'=>'ID User yang anda pilih sudah terdaftar',
            'nama.required'=>'Nama wajib diisi',
            'telp.required'=>'No Telepon wajib diisi',
            'jk.required'=>'Pilih jenis kelamin',
            'foto.required'=>'Masukkan foto',
        ]);
        $data=[
            'nis_nik'=>$request->nis_nik,
            'id_user'=> $request->id_user,
            'nama'=>$request->nama,
            'telp'=>$request->telp,
            'status'=>$request->status,
            'jk'=>$request->jk,
            'foto'=>$request->foto,
        ];
        Member::create($data);
        return redirect()->to('member')->with('success','Berhasil menambahkan data');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $memberId)
    {
        // $member = Member::findOrFail($memberId);

        // // Pass the user data to the view
        // return view('mail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Member::where('nis_nik', $id)->first();

        if (!$data) {
            // Handle the case where no data is found
            return redirect()->back()->with('error', 'Member tidak ditemukan'); // Or any other appropriate action
        }
    
        return view('pegawai.member.edit')->with('data', $data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'foto' => 'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'telp.required'=>'No Telepon wajib diisi',
            'jk.required'=>'Pilih jenis kelamin',
            'foto.required'=>'Masukkan foto',
        ]);
        $data=[
            'nama'=>$request->nama,
            'telp'=>$request->telp,
            'jk'=>$request->jk,
            'foto'=>$request->foto,
        ];
        Member::where('nis_nik',$id)->update($data);
        return redirect()->to('member')->with('success','Berhasil update data');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::where('nis_nik',$id)->delete();
        return redirect()->to('member')->with('success','Berhasil menghapus data');
    }

}
