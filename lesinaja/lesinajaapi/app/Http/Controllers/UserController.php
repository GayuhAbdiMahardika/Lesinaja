<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = User::where('id',$id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
            'email'=>'required',
            // 'password'=>'required',
            'no_telp'=>'required',
            // 'id_kota'=>'required',
            'alamat'=>'required',
            'kota'=>'required',
            'role'=>'required',
        ]);

        $token = Str::random(32);

        $user = [
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password' => '0',
            'no_telp'=>$request->no_telp,
            'id_kota'=>$request->id_kota,
            'alamat'=>$request->alamat,
            'kota'=>$request->kota,
            'token'=>$token,
            'role'=>$request->role
        ];

        $response = User::create($user);

        if($response){

            // Mail::send('isiemail', array('token' => $token) , function($pesan) use($request){
            //     $pesan->to($request->email,'Verifikasi')->subject('Verifikasi Email');
            //     $pesan->from(env('MAIL_USERNAME','bchat4505@gmail.com'),'Verifikasi Akun email anda');
            // });

            return response()->json([
                'pesan' => 'User sudah dimasukkan',
                'data' => $response
            ]);
        }
    }

    public function destroy($id){
        $order = User::where('id',$id)->delete();

        if($order){
            return response()->json([
                'pesan' => 'User sudah dihapus',
                'data' => $order
            ]);
        }
        
        // return response()->json('deleted');
    }

    public function update($id, Request $request)
    {
        $order = User::where('id',$id)->update($request->all());
                if($order){
                    return response()->json([
                        'pesan' => 'Data sudah diupdate',
                        'status' => 201,
                        'data' => $order
                    ]);
                }
    }
}
