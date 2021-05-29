<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listmahasiswa = Mahasiswa::all();
        
        return response()->json([
            'status' => true,
            'data' => $listmahasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cara 1 (default)
        /*$mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();*/

        //Cara 2 (mass assignment)
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data Mahasiswa berhasil disimpan!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mennggunakan findOrFail
        //$mahasiswa = Mahasiswa::findOrFail($id);
        //menggunakan find
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            return response()->json([
                'status' => true,
                'data' => $mahasiswa,
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "Data mahasiswa tidak ditemukan!",
        ]);
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
        //
        $mahasiswa = Mahasiswa::findOrFail($id);
        if($mahasiswa){
            $mahasiswa->update($request->all());
            return response()->json([
                'status' => true,
                'data' => Mahasiswa::find($id),
                'message' => "Data mahasiswa berhasil diupdate!",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Data mahasiswa gagal diupdate!",
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->delete(); //mandelete record 
            return response()->json([
                'status' => true,
                'message' => "Data mahasiswa berhasil dihapus!",
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => "Data mahasiswa gagal dihapus!",
        ]);
    }
}
