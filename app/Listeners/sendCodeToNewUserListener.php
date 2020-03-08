<?php

namespace App\Listeners;

use App\Http\Controllers\AuthController;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendCodeToNewUserListener
{

    public function handle($event)
    {
        $sms = (new AuthController())->getCode($event->phone_number , $event->code);
        if ($sms->status() == 200)
        {
            $user = User::create([
                'phone_number' => $event->phone_number ,
                'email' => $event->email ,
                'password' => bcrypt($event->password) ,
                'code' =>  $event->code ,
            ]);
            $accessToken = $user->createToken('AuthToken' , ['user'])->accessToken;
            return response()->json([
                'message' => $sms->getOriginalContent() ,
                'user' => $user ,
                'access_token' => $accessToken
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'an error occurred' ,
                'status' => 'error' ,
                'code' => $sms->status() ,
                'body' => $sms->getOriginalContent()
            ] , 400);
        }
    }
}
