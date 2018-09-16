<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('role', 1)->paginate(10);
        return view('siswa.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->nisn = $request->input('nisn');
        $user->password = bcrypt($request->input('angkatan'));
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->jurusan = $request->input('jurusan');
        $profile->angkatan = $request->input('angkatan');
        $profile->save();

        return redirect()->route('admin.index.siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['users'] = User::find($id);
        return view('siswa.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::find($id);
        $data['profile'] = Profile::all();
        return view('siswa.edit')->with($data);
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->nisn = $request->input('nisn');
        $user->save();

        $profile = Profile::find($id);
        $profile->jurusan = $request->input('jurusan');
        $profile->angkatan = $request->input('angkatan');
        $profile->save();

        return redirect()->route('admin.show.siswa', [$id]);
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
