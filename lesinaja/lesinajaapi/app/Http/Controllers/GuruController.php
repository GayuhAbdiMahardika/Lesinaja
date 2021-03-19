<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Guru::where('id',$id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'password'=>'required',
            'no_telp'=>'required',
            'id_kota'=>'required',
            'alamat'=>'required',
            ]);

        $response = Guru::create($request->all());

        if($response){

            return response()->json([
                'pesan' => 'Guru sudah dimasukkan',
                'data' => $response
            ]);
        }
    }

    public function destroy($id){
        $guru = Guru::where('id',$id)->delete();

        if($guru){

            return response()->json([
                'pesan' => 'Guru sudah dihapus',
                'data' => $guru
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $guru = Guru::where('id',$id)->update($request->all());
                if($guru){
                    return response()->json([
                        'pesan' => 'Guru sudah diupdate',
                        'status' => 201,
                        'data' => $guru
                    ]);
                }
    }
}
