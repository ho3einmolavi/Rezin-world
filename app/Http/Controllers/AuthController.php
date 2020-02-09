<?php

namespace App\Http\Controllers;

use App\Events\NewUserHasRegisteredEvent;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'phone_number' => ['required', 'string', 'max:255' , 'unique:users' , 'iran_mobile' ],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }

        $code = rand(100000, 999999);

        $results = event(new NewUserHasRegisteredEvent($request->phone_number , $code , $request->email , $request->password));

        return response()->json($results[0]->original);
    }

    public function login(Request $request)
    {
        //validation
        $validData = Validator::make($request->all() , [
            'password' => ['required', 'string'] ,
            'login' => 'required'
        ]);

        if ($validData->fails())
        {
            return response()->json($validData->errors()->all(), 400);
        }

        if (filter_var($request->login , FILTER_VALIDATE_EMAIL))
        {
            //check login
            if (! auth()->attempt(['email' => $request->login , 'password' => $request->password]))
            {
                return \response()->json(['اطلاعات وارد شده صحیح نیست'], 400);
            }

        }

        else
        {
            //check login
            if (! auth()->attempt(['phone_number' => $request->login , 'password' => $request->password]))
            {
                return \response()->json(['اطلاعات وارد شده صحیح نیست'], 400);
            }
        }

        if (auth()->user()->verification == 1)
        {
            $accessToken = auth()->user()->createToken('AuthToken')->accessToken;

            //return a response
            return response()->json([
                'user' => auth()->user() ,
                'access_token' => $accessToken
            ]);
        }
        else
        {
            return \response()->json(['شماره همراه کاربر تایید نشده است'], 400);
        }
    }


    public function getCode($phone_number , $code)
    {

        $client = new Client();
        $body = [
            'receptor' => $phone_number,
            'token' => $code,
            'template' => 'verify'
        ];
        $headers = [
            'Accept' => 'application/json',
//            'Content-Length' => 411
        ];


        $response = $client->post('https://api.kavenegar.com/v1/78645A53426B482B63316372637968556838724F2B712B4B5252587236434C31446A466C506A542F6D5A343D/verify/lookup.json', [
            'form_params' => $body,
            'headers' => $headers
        ]);

        if ($response->getStatusCode() == 200)
        {
            return response()->json([
                'message' => ['کد تایید برای شما ارسال شد'] ,
                'status' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'an error occurred' ,
            'status' => 'error' ,
            'code' => $response->getStatusCode()
        ] , 400);
    }
}
