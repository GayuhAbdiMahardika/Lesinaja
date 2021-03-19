<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public function verify($token)
    {
        // $p = urlencode('gayuhabdi80@gmail.com');

        $data = User::where('token',$token)->get();
        if(count($data) == 0){
            
        }

        try {
            //code...
            if($data[0]['token'] === $token){
                User::where('token',$token)->update(['token'=>0]);
                return 'Email sudah terverify';
            }
        } catch (\Throwable $th) {
            // return 'token invalid'
            return 'token tidak valid';
        }


    }
}
