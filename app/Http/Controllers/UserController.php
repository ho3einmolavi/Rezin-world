<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->get();
        return new JsonResponse($users);
    }

    public function registerForApp(Request $request)
    {
        //validation data
        $validator = Validator::make($request->all() ,[
            'phone_number' => ['required', 'string', 'max:255' , 'exists:users' , 'iran_mobile'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors(), 400);
        }


        $user = User::where('phone_number' , $request->phone_number)->first();
        if (is_null($user))
        {
            return response()->json([
                'message' => ['کاربر مورد نظر یافت نشد'] ,
            ] , 404);
        }

        if (! $user->verification)
        {
            return new JsonResponse([
                'message' => ['این شماره تایید نشده است'],
            ] , 400);
        }




        $user->update([
            'email' => $request->email ,
            'password' => bcrypt($request->password) ,
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name,
            'api_token' => Str::random(200),
        ]);

        // return a response
        return new JsonResponse($user);
    }

    public function login(Request $request)
    {
        //validation
        $validData = Validator::make($request->all() , [
            'password' => ['required', 'string', 'min:8'] ,
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
                return \response()->json('اطلاعات وارد شده صحیح نیست', 400);
            }

        }

        else
        {
            //check login
            if (! auth()->attempt(['phone_number' => $request->login , 'password' => $request->password]))
            {
                return \response()->json('اطلاعات وارد شده صحیح نیست', 400);
            }
        }

        //return a response
        return new JsonResponse(auth()->user());
    }

    public function getCodeForApp(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone_number' => ['required', 'string', 'max:255' , 'unique:users' , 'iran_mobile'],
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $code = rand(100000, 999999);
        $client = new Client();
        $body = [
            'receptor' => $request->phone_number,
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

        User::create([
            'code' => $code ,
            'phone_number' => $request->phone_number ,
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

    public function getCode(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone_number' => ['required', 'string', 'max:255' , 'unique:users' , 'iran_mobile'],
            'email' => ['nullable' ,'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $code = rand(100000, 999999);
        $client = new Client();
        $body = [
            'receptor' => $request->phone_number,
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

        User::create([
            'code' => $code ,
            'phone_number' => $request->phone_number ,
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

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'code' => ['required'],
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $client = new Client();
        $user = \auth()->user();
        $body = [
            'receptor' => $user->phone_number,
            'token' => $user->first_name ,
            'token2' => $request->code,
            'template' => 'order'
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
                'status' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'an error occurred' ,
            'status' => 'error' ,
            'code' => $response->getStatusCode()
        ] , 400);

    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone_number' => ['required', 'string', 'max:255' , 'exists:users' , 'iran_mobile'],
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $user = User::where('phone_number' , $request->phone_number)->firstOrFail();

        $code = rand(100000, 999999);
        $client = new Client();
        $body = [
            'receptor' => $request->phone_number,
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

        $user->update([
            'code' => $code ,
            'verification' => 0
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

    public function forgetPassword_verify(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone_number' => ['required', 'string', 'max:255' , 'exists:users' , 'iran_mobile'],
            'code' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $code = $request->code;
        $phone = $request->phone_number;
        $user = User::where('phone_number' , $phone)->first();
        if (is_null($user))
        {
            return response()->json([
                'message' => ['کاربر مورد نظر یافت نشد'] ,
            ] , 404);
        }

        if (($user->code == $code))
        {
            $user->update([
                'verification' => '1' ,
                'password' => bcrypt($request->phone_number) ,
            ]);

            return response()->json([
                'message' => 'شماره موبایل شما تایید شد',
                'password' => 'رمز عبور جدید شما همان شماره موبایل است برای تغییر آن به حساب کاربری خود بروید' ,
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => ['کد وارد شده اشتباه است'] ,
        ] , 400);


    }

    public function verificationTheCodeForApp(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'code' => 'required' ,
            'phone_number' => 'required|iran_mobile' ,
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'data' => $validator->errors()->all()
            ] ,400);
        }
        $code = $request->code;
        $phone = $request->phone_number;
        $user = User::where('phone_number' , $phone)->first();
        if (is_null($user))
        {
            return response()->json([
                'message' => ['کاربر مورد نظر یافت نشد'] ,
            ] , 404);
        }

//        if (! $user->verification)
//        {
//            return new JsonResponse([
//                'message' => ['این شماره تایید نشده است'],
//            ] , 400);
//        }

        if (($user->code == $code))
        {
            $user->update([
                'verification' => '1' ,
            ]);

            return response()->json([
                'message' => ['شماره موبایل شما تایید شد'],
                'user' => $user
            ]);
        }

        return response()->json([
            'message' => ['کد وارد شده اشتباه است'] ,
        ] , 400);
    }

    public function verificationTheCode(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'code' => 'required' ,
            'phone_number' => 'required|iran_mobile' ,
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'data' => $validator->errors()->all()
            ] ,400);
        }
        $code = $request->code;
        $phone = $request->phone_number;
        $user = User::where('phone_number' , $phone)->first();
        if (is_null($user))
        {
            return response()->json([
                'data' => ['کاربر مورد نظر یافت نشد'] ,
            ] , 404);
        }


        if (($user->code == $code))
        {
            $user->update([
                'verification' => '1' ,
            ]);

            return response()->json([
                'data' => ['شماره موبایل شما تایید شد'],
                'user' => $user
            ]);
        }

        return response()->json([
            'data' => ['کد وارد شده اشتباه است'] ,
        ] , 400);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $valid = Validator::make($request->all(), [
            'old' => 'required',
            'new' => 'required|alpha_dash',
            'confirm' => 'required|alpha_dash',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors()->all(), 400);
        }

        if (Hash::check($request->old , $user->password))
        {
            if ($request->new === $request->confirm)
            {
                $user->update([
                    'password' => bcrypt($request->new)
                ]);
            }
            else
            {
                return response(['پسوردها منطبق نیستند لطفا دوباره امتحان کنید'], 422);
            }
        }
        else
        {
            return response(['پسورد وارد شده اشتباه است'], 422);
        }
        return response([
            'message' => 'تغییرات با موفقیت اعمال شد' ,
            'status' => 'success'
        ] ,200);

    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user->delete())
        {
            return 'the user is deleted successfully';
        }

        return 'This user could not be deleted';
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $valid = Validator::make($request->all(), [
            'phone' =>'nullable|numeric',
            'phone_number' => 'required|iran_mobile' ,
            'postal_code' =>'required|numeric',
            'address' => 'required' ,
            'first_name' => 'required' ,
            'last_name' => 'required' ,

        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all(), 400);
        }


        $user->update([
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name ,
            'phone' => $request->phone ,
            'phone_number' => $request->phone_number ,
            'email' => $request->email ,
            'postal_code' => $request->postal_code ,
            'state' => $request->state ,
            'city' => $request->city ,
            'address' => $request->address ,
        ]);

        return new JsonResponse($user);
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = $user->orders;
        return $orders;
    }
}
