<?php

namespace App\Http\Controllers;

use App\Brand;
use App\MainCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'name' => 'required' ,
            'main_category_id' => 'required'
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $cat = MainCategory::find($request->main_category_id);
        if ($cat)
        {
            $brand = Brand::create([
                'name' => $request->name ,
                'main_category_id' => $request->main_category_id ,
            ]);
            return new JsonResponse($brand);
        }
        else
        {
            return new JsonResponse('دسته بندی پیدا نشد' , 404);
        }
    }

    public function findBrands($id)
    {
        $cat = MainCategory::find($id);
        if ($cat)
        {
            $brands = $cat->brands;
            if (! $brands->isEmpty())
            {
                return response()->json($brands);
            }
            else
            {
                return response()->json('برندی برای این دسته بندی وجود ندارد' , 404);
            }
        }
        else
        {
            return response()->json('دسته بندی یافت نشد' , 404);
        }
    }

    public function index()
    {
        $brands = Brand::latest('id')->get();
        if (! $brands->isEmpty())
        {
            foreach ($brands as $index => $brand)
            {
                $brand['cat'] = $brand->main['name'];
            }
            return response()->json($brands);
        }
        else
        {
            return response()->json('برندی یافت نشد' , 404);
        }
    }
}
