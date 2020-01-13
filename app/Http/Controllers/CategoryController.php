<?php

namespace App\Http\Controllers;

use App\MainCategory;
use App\SecondaryCategory;
use App\ThirdCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index()
    {
        $cat = MainCategory::all();
        $cat1 = SecondaryCategory::all();
        $res = [];
        $res[0] = $cat;
        $res[1] = $cat1;
        return \response()->json($res);
    }

    public function main()
    {
        $category = MainCategory::all();
        return response()->json($category);
    }

    public function second($id)
    {
        $main = MainCategory::find($id);
        return ($main->secondaryCategories);
    }

    public function third($id)
    {
        $second = SecondaryCategory::find($id);
        return ($second->thirdCategories);
    }

    public function all_third()
    {
        $third = ThirdCategory::all();
        return response()->json($third);
    }

    public function menu()
    {
        $message = 'it is working';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
        $one = MainCategory::all();
        $arr = [];
        foreach ($one as $key => $item)
        {
            $arr[$key] = $item;
            $arr[$key]['second'] = $this->second($item->id);
            foreach ($arr[$key]['second'] as $key1 => $value)
            {
                $third =  $this->third($value->id);
                $arr[$key]['second'][$key1]['third'] = $third;
            }
        }

        return response()->json($arr);
    }

    public function all($id)
    {
        $one = $this->second($id);


        $two = [];

        foreach ($one as $item)
        {
            $two[$item->name] = $this->third($item->id);
        }

        return response()->json($two);
    }

    public function create(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'name' => 'required' ,
            'img' => 'image' ,
            'icon' => 'image' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }


        if (! $request->has('mother') || $request->mother == '')
        {
            if ($request->has('img'))
            {
                $image = $request->file('img');
                $name = $image->getClientOriginalName();
                $image->move(public_path('/images/category') , $name);
            } else $name = null;
            if ($request->has('icon'))
            {
                $image1 = $request->file('icon');
                $name1 = $image1->getClientOriginalName();
                $image1->move(public_path('/images/icon') , $name1);
            } else $name1 = null;

            $cat = MainCategory::create([
                'name' => $request->name ,
                'img' => $name ,
                'icon' => $name1
            ]);
        }
        else
        {
            $cat = MainCategory::where('name' , $request->mother)->first();
            if (!$cat)
            {
                $cat = SecondaryCategory::where('name' , $request->mother)->first();
                if ($cat)
                {
                    $cat = ThirdCategory::create([
                        'name' => $request->name ,
                        'main_category_id' => $cat->main_category_id ,
                        'secondary_category_id' => $cat->id
                    ]);
                }
                else return \response()->json('something went wrong in CategoryController' , 400);
            }
            else
            {
                $cat = SecondaryCategory::create([
                    'name' => $request->name ,
                    'main_category_id' => $cat->id ,
                ]);
            }
        }

        return \response()->json($cat) ;
    }
}
