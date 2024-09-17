<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Mail\EmailMember;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    // public function sendEmail($userId)
    // {
    //     $user = User::findOrFail($userId);
    //     $member = $user->member;
    //     $emailContent = "Hallo {$member->name}
    //     This is your account
    //     Username:{{ $user->username }}
    //     Password: {{$user->password}} ";
    //     Mail::to($user->email)->send(new EmailMember($emailContent));
    //     // return response()->json(['message' => 'Email sent successfully']);
    //     return view('mail', compact('user'));
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::orderBy('username','desc')->get();
        return view('pegawai.')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'username.required'=>'Username wajib diisi',
            'email.unique'=>'Email yang anda masukkan sudah terdaftar',
            'password.required'=>'Password wajib diisi',
        ]);
        $data=[
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $user = User::create($data);

        // $member = member::findOrFail($request->nis);
        // $emailContent = "Hallo {$member->nama}<br>
        $emailContent = "Hallo Pengguna Perpustakaan11! <br>
        Ini akun Perpustakaan11 Online kamu ya : <br>
        Username: {$user->username} <br>
        Password: {$request->password} ";
        Mail::to($user->email)->send(new EmailMember($emailContent));

        return redirect()->to('/member/create')->with('success','Berhasil mengirimkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $userId)
    {
        // $user = User::findOrFail($UserId);

        // // Pass the user data to the view
        // return view('mail', compact('user'));
        $user = User::findOrFail($userId);
        $member = $user->member;
        $emailContent = "Hallo {$member->name}
        This is your account
        Username:{{ $user->username }}
        Password: {{$user->password}} ";
        Mail::to($user->email)->send(new EmailMember($emailContent));
        // return response()->json(['message' => 'Email sent successfully']);
        return view('pegawai.member.create', compact('user'));
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
