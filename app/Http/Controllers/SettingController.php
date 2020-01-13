<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $setting = Setting::orderBy('id' , 'DESC')->first();

        if (!$setting)
        {

            $setting = Setting::create([
                'title' => $request->title ,
                'keywords' => $request->keywords ,
                'description' => $request->description ,
                'address' => $request->address ,
                'consultant_mobile' => $request->consultant_mobile ,
                'consultant_number' => $request->consultant_number ,
                'telegram' => $request->telegram ,
                'email' => $request->email ,
                'email_info' => $request->email_info ,
                'instagram' => $request->instagram ,
                'account_number' => $request->account_number ,
                'card_number' => $request->card_number ,
                'account_owner' => $request->account_owner ,
            ]);
        }
//        title: '' ,
//                    description: '' ,
//                    keywords: '' ,
//                    address: '' ,
//                    consultant_mobile: '' ,
//                    consultant_number: '' ,
//                    telegram: '',
//                    email: '' ,
//                    email_info: '' ,
//                    instagram: '' ,
//                    account_number: '' ,
//                    card_number: '' ,
//                    account_owner: '' ,
//                    logo: '' ,
        else
        {
            $setting->update([
                'title' => $request->title ,
                'keywords' => $request->keywords ,
                'description' => $request->description ,
                'address' => $request->address ,
                'consultant_mobile' => $request->consultant_mobile ,
                'consultant_number' => $request->consultant_number ,
                'telegram' => $request->telegram ,
                'email' => $request->email ,
                'email_info' => $request->email_info ,
                'instagram' => $request->instagram ,
                'account_number' => $request->account_number ,
                'card_number' => $request->card_number ,
                'account_owner' => $request->account_owner ,
            ]);
        }

        return response()->json($setting);
    }

    public function index()
    {
        $set = Setting::all();
        if ($set->isEmpty())
        {
            $set = Setting::create([
                'title' => 'کالیمو' ,
                'description' => 'کالیمو یکی از بزرگترین و معتبرترین سوپر مارکت های انلاین کشور می باشد . که با اتکا به محصولات با کیفیت و قیمت رقابتی پا به عرصه فروش آنلاین در ایران گذاشته است و فعالیت خود را در زمینه فروش محصولات غذایی ار سال 1397 آغاز کرد.'
            ]);
        }
        return response()->json($set);
    }

    public function logo(Request $request)
    {

        $validata = Validator::make($request->all() , [
            'logo' => 'nullable|image' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }


        if ($request->has('logo') || $request->logo != null || $request->logo != '')
        {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/img/logo') , $name);
            $setting = Setting::orderBy('id' , 'DESC')->first();
            if ($setting)
            {
                $setting->update([
                    'logo' => $name
                ]);
                return response($setting);
            }
            return response('setting not found (fileController)' , 404);
        }

        return response('your file is empty' , 400);
    }
}
