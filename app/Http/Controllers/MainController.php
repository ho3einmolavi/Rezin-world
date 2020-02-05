<?php

namespace App\Http\Controllers;

use App\Article;
use App\MainCategory;
use App\SecondaryCategory;
use App\Setting;
use App\ThirdCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Morilog\Jalali\Jalalian;

class MainController extends Controller
{
    public function index()
    {

        $set = Setting::orderBy('id' , 'DESC')->first();
        if (!$set)
        {
            return view('index' , [
                'description' => '' ,
                'title' => 'صفحه اصلی' ,
                'keywords' => "کالیمو,سوپرمارکت آنلاین"
            ]);
        }
        else
        {
            return view('index' , [
                'description' => $set->description ,
                'title' => $set->title ,
                'keywords' => $set->keywords
            ]);
        }
    }

    public function mainCat()
    {
        $set = Setting::orderBy('id' , 'DESC')->first();
        if (Route::currentRouteName() == 'main')
        {
            $cat = MainCategory::find(request()->route('any'));

            return view('products' , [
            'keywords' => "{$set->keywords},{$cat->name}"
        ]);
        }

        else if (Route::currentRouteName() == 'second')
        {
            $cat = MainCategory::find(request()->route('any'));
            $second = request()->route('any1');

            return view('products' , [
                'keywords' => "{$set->keywords},{$cat->name},{$second}"
            ]);
        }

       else if (Route::currentRouteName() == 'second')
        {
            $cat = MainCategory::find(request()->route('any'));
            $second = request()->route('any1');

            return view('products' , [
                'keywords' => "{$set->keywords},{$cat->name},{$second}"
            ]);
        }

       else
       {
           $res = request()->route('any');
           return view('products' , [
               'keywords' => "{$set->keywords},{$res}"
           ]);
       }
    }

    public function article()
    {
        $article = Article::where('title' , request()->route('title'))->first();
        return view('article' , [
            'article' => $article ,
            'user' => $article->user ,
            'date' => Jalalian::forge($article->updated_at)->format('%A, %d %B %y') ,
            'time' =>  Jalalian::fromDateTime($article->updated_at)->format('H:i')
        ]);
    }

}
