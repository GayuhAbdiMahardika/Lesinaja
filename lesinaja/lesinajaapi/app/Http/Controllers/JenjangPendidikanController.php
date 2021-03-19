<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;

class JenjangPendidikanController extends Controller
{
    public function index()
    {
        $data = JenjangPendidikan::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = JenjangPendidikan::where('id',$id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, ['jenjang_pendidikan'=>'required']);

        $response = JenjangPendidikan::create($request->all());

        if($response){
            return response()->json([
                'pesan' => 'Jenjang Pendidikan sudah dimasukkan',
                'data' => $response
            ]);
        }
    }

    public function destroy($id){
        $jenjangPendidikan = JenjangPendidikan::where('id',$id)->delete();

        if($jenjangPendidikan){

            return response()->json([
                'pesan' => 'Jenjang Pendidikan sudah dihapus',
                'data' => $jenjangPendidikan
            ]);
        }
        
        // return response()->json('deleted');
    }

    public function update($id, Request $request)
    {
        $jenjangPendidikan = JenjangPendidikan::where('id',$id)->update($request->all());
                if($jenjangPendidikan){
                    return response()->json([
                        'pesan' => 'Data sudah diupdate',
                        'status' => 201,
                        'data' => $jenjangPendidikan
                    ]);
                }
    }
}
