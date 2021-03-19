<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Order::where('id',$id)->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'email_user'=>'required',
            'jenjang_pendidikan'=>'required',
            'jenjang_kelas'=>'required',
            'durasi_belajar'=>'required',
            'total_bulan'=>'required',
            'hari'=>'required',
            'jam_mulai'=>'required',
            'pertemuan_pertama'=>'required',
            ]);

        $response = Order::create($request->all());

        if($response){

            Mail::send('emailorderuser', array('token' => 'ok') , function($pesan) use($request){
                $pesan->to($request->email_user,'Order')->subject('Pesanan Lesinaja');
                $pesan->from(env('MAIL_USERNAME','bchat4505@gmail.com'),'Order Akun email anda');
            });

            return response()->json([
                'pesan' => 'Order sudah dimasukkan',
                'data' => $response
            ]);
        }
    }

    public function destroy($id){
        $order = Order::where('id',$id)->delete();

        if($order){
            return response()->json([
                'pesan' => 'Kota sudah dihapus',
                'data' => $order
            ]);
        }
        
        // return response()->json('deleted');
    }

    public function update($id, Request $request)
    {
        $order = Order::where('id',$id)->update($request->all());
                if($order){
                    return response()->json([
                        'pesan' => 'Data sudah diupdate',
                        'status' => 201,
                        'data' => $order
                    ]);
                }
    }
}
