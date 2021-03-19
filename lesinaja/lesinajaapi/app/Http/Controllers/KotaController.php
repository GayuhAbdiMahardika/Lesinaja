<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function index()
    {
        $data = Kota::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Kota::where('id',$id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, ['kota'=>'required']);

        $response = Kota::create($request->all());

        if($response){

            return response()->json([
                'pesan' => 'Durasi Belajar sudah dimasukkan',
                'data' => $response
            ]);
        }
    }

    public function destroy($id){
        $kota = Kota::where('id',$id)->delete();

        if($kota){
            return response()->json([
                'pesan' => 'Kota sudah dihapus',
                'data' => $kota
            ]);
        }
        
        // return response()->json('deleted');
    }

    public function update($id, Request $request)
    {
        $kota = Kota::where('id',$id)->update($request->all());
                if($kota){
                    return response()->json([
                        'pesan' => 'Data sudah diupdate',
                        'status' => 201,
                        'data' => $kota
                    ]);
                }
    }
}
