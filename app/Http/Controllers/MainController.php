<?php

namespace App\Http\Controllers;

use App\MainCategory;
use App\SecondaryCategory;
use App\Setting;
use App\ThirdCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

class MainController extends Controller
{
    public function index()
    {

        $set = Setting::orderBy('id' , 'DESC')->first();
        if (!$set)
        {
            return view('index' , [
                'keywords' => "کالیمو,سوپرمارکت آنلاین"
            ]);
        }
        else
        {
            return view('index' , [
                'keywords' => $set->keywords
            ]);
        }
    }

    public function mainCat()
    {
        if (Route::currentRouteName() == 'main')
        {
            $cat = MainCategory::find(request()->route('any'));

            return view('products' , [
            'keywords' => $cat->name
        ]);
        }

        else if (Route::currentRouteName() == 'second')
        {
            $cat = MainCategory::find(request()->route('any'));
            $second = request()->route('any1');

            return view('products' , [
                'keywords' => "{$cat->name},{$second}"
            ]);
        }

       else if (Route::currentRouteName() == 'second')
        {
            $cat = MainCategory::find(request()->route('any'));
            $second = request()->route('any1');

            return view('products' , [
                'keywords' => "{$cat->name},{$second}"
            ]);
        }

       else
       {

           return view('products' , [
               'keywords' => request()->route('any')
           ]);
       }


//        $name =  Route::current();
//
//
//        return new JsonResponse($name);
    }

}
