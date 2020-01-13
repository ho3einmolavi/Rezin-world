<?php

namespace App\Http\Controllers;


use App\Brand;
use App\MainCategory;
use App\Product;
use App\SecondaryCategory;
use App\ThirdCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    public function edit($id , Request $request)
    {
        $validata = Validator::make($request->all() , [
            'third_category_id' => 'required' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }
        $product = Product::find($id);
        $cat = ThirdCategory::find($request->third_category_id);

        if ($request->has('product_img') && $request->product_img != null && $request->product_img != '')
        {
            $image2 = $request->file('product_img');
            $name2 = $image2->getClientOriginalName();
            $image2->move(public_path('/images/products') , $name2);
            $product->update([
                'title' => $request->title ,
                'price' => $request->price ,
                'final_price' => $request->price * $request->discount ,
                'number' => $request->number ,
                'discount' => $request->discount ,
                'brand_id' => $request->brand_id ,
                'main_category_id' => $cat->main->id ,
                'secondary_category_id' => $cat->second->id,
                'third_category_id' => $request->third_category_id ,
                'description' => $request->description ,
                'product_img' => $name2 ,
            ]);
        }
        else
        {
            $product->update([
                'title' => $request->title ,
                'price' => $request->price ,
                'final_price' => $request->price * $request->discount ,
                'number' => $request->number ,
                'discount' => $request->discount ,
                'brand_id' => $request->brand_id ,
                'main_category_id' => $cat->main->id ,
                'secondary_category_id' => $cat->second->id,
                'third_category_id' => $cat->id ,
                'description' => $request->description ,
            ]);
        }

        return response()->json($product);
    }

    public function show($id)
    {
        $products = Product::find($id);

        $products['category'] = [
            'main' => $products->main->name ,
            'secondary' => $products->second->name ,
            'third' => $products->third->name ,
        ];

        return response()->json($products);
    }

    public function index()
    {
        $products = Product::latest('id')->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'title' => 'required' ,
            'third_category_id' => 'required' ,
            'price' => 'required' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $cat = ThirdCategory::find($request->third_category_id);
        if (! is_null($cat))
        {
            if ($request->has('product_img') && $request->product_img != null && $request->product_img != '')
            {
                $image2 = $request->file('product_img');
                $name2 = $image2->getClientOriginalName();
                $image2->move(public_path('/images/products') , $name2);
                $product = Product::create([
                    'title' => $request->title ,
                    'price' => $request->price ,
                    'final_price' => $request->price * $request->discount ,
                    'number' => $request->number ,
                    'discount' => $request->discount ,
                    'brand_id' => $request->brand_id ,
                    'main_category_id' => $cat->main->id ,
                    'secondary_category_id' => $cat->second->id,
                    'third_category_id' => $cat->id ,
                    'description' => $request->description ,
                    'product_img' => $name2 ,
                ]);
            }
            else
            {
                $product = Product::create([
                    'title' => $request->title ,
                    'price' => $request->price ,
                    'final_price' => $request->price * $request->discount ,
                    'number' => $request->number ,
                    'discount' => $request->discount ,
                    'brand_id' => $request->brand_id ,
                    'main_category_id' => $cat->main->id ,
                    'secondary_category_id' => $cat->second->id,
                    'third_category_id' => $cat->id ,
                    'description' => $request->description ,
                ]);
            }

        }
        else
        {
            return response()->json('دسته بندی برای این محصول یافت نشد' , 404);
        }

        return response()->json($product);
    }

    public function filters($param)
    {
        if ($param === 'newest')
        {
            $products = Product::orderBy('id' , 'DESC');
        }

        else if ($param === 'cheaper')
        {
            $products = Product::orderBy('price' , 'ASC');
        }

        else if ($param === 'expensive')
        {
            $products = Product::orderBy('price' , 'DESC');
        }

        else
        {
            $products = Product::orderBy('id' , 'DESC');
        }

        $products = $products->get();
        $arr = array() ;
        $LNG =  ceil(count($products) / 4);

       for ($i = 0 , $k = 0; $i< $LNG; $i++ , $k += 4)
       {
           for ($j = $k; $j< $k + 4; $j++ )
           {
               if (isset($products[$j]))
               {
                   $arr[$i][] = $products[$j];
               }
           }
       }
        return response()->json($arr);
    }

    public function filterByBrands(Request $request)
    {
        $brands = Brand::find($request->brands);
        $arr = [];
        foreach ($brands as $brand) {
            if (!$brand->products->isEmpty()) {
                $arr[] = $brand->products;
            }
        }

        $result = [];

        foreach ($arr as $items) {
            foreach ($items as $item) {
                $result[] = $item;
            }
        }

        $LNG = ceil(count($result) / 4);
        $arr = [];
        for ($i = 0, $k = 0; $i < $LNG; $i++, $k += 4) {
            for ($j = $k; $j < $k + 4; $j++)
            {
                if (isset($result[$j]))
                {
                    $arr[$i][] = $result[$j];
                }
            }
        }
        return response()->json($arr);
    }

    public function mostSale()
    {
        $products = Product::orderBy('sale' , 'DESC')->take(18)->get();
        $LNG = ceil(count($products) / 3);
        $arr = [];
        for ($i = 0, $k = 0; $i < $LNG; $i++, $k += 6) {
            for ($j = $k; $j < $k + 6; $j++)
            {
                if (isset($products[$j]))
                {
                    $arr[$i][] = $products[$j];
                }
            }
        }
        return new JsonResponse($arr);
    }

    public function filterByCategory($id , $param)
    {
        $cat = MainCategory::find($id);
        if ($cat->products->isEmpty())
        {
            return response()->json('محصولی برای این دسته بندی یافت نشد' ,  404);
        }

        if ($param == 'newest')
        {
            $cat = $cat->products()->orderBy('id' , 'DESC')->get();
        }

        else if ($param == 'cheaper')
        {
            $cat = $cat->products()->orderBy('final_price' , 'ASC')->get();
        }

        else if ($param == 'the-most-expensive')
        {
            $cat = $cat->products()->orderBy('final_price' , 'DESC')->get();
        }

        else $cat = $cat->products;

        $LNG = ceil(count($cat) / 4);
        $arr = [];
        for ($i = 0, $k = 0; $i < $LNG; $i++, $k += 4) {
            for ($j = $k; $j < $k + 4; $j++)
            {
                if (isset($cat[$j]))
                {
                    $arr[$i][] = $cat[$j];
                }
            }
        }
        return response()->json($arr);
    }

    public function search(Request $request , Product $product , $param)
    {
        //checking inputs
        if ($request->has('title'))
        {
            $product = $product->where('title', 'LIKE' , '%' .$request->title. '%');
        }

        //return an error if no results are found
        if ($product->get()->isEmpty())
        {
            return response()->json('محصول مورد نظر شما یافت نشد', 404);
        }

        if ($param == 'newest')
        {
            $product = $product->orderBy('id' , 'DESC')->get();
        }

        else if ($param == 'cheaper')
        {
            $product = $product->orderBy('final_price' , 'ASC')->get();
        }

        else if ($param == 'the-most-expensive')
        {
            $product = $product->orderBy('final_price' , 'DESC')->get();
        }

        else $product = $product->latest()->get();


        $LNG = ceil(count($product) / 4);
        $arr = [];
        for ($i = 0, $k = 0; $i < $LNG; $i++, $k += 4) {
            for ($j = $k; $j < $k + 4; $j++)
            {
                if (isset($product[$j]))
                {
                    $arr[$i][] = $product[$j];
                }
            }
        }

        //return results
        return response()->json($arr);
    }

    public function productsBySecondCat($main , $sec , $param)
    {
        $Second = SecondaryCategory::where('name' , $sec)->first();
        if (!$Second)
        {
            return response()->json('دسته بندی دوم پیدا نشد' , 404);
        }

        $products = Product::where('main_category_id' , $main)->where('secondary_category_id' , $Second->id);
        if ($products->get()->isEmpty())
        {
            return response()->json('محصولی پیدا نشد' , 404);
        }

        if ($param == 'newest')
        {
            $products = $products->orderBy('id' , 'DESC')->get();
        }

        else if ($param == 'cheaper')
        {
            $products = $products->orderBy('final_price' , 'ASC')->get();
        }

        else if ($param == 'the-most-expensive')
        {
            $products = $products->orderBy('final_price' , 'DESC')->get();
        }

        else $products = $products->get();

        $LNG = ceil(count($products) / 4);
        $arr = [];
        for ($i = 0, $k = 0; $i < $LNG; $i++, $k += 4) {
            for ($j = $k; $j < $k + 4; $j++)
            {
                if (isset($products[$j]))
                {
                    $arr[$i][] = $products[$j];
                }
            }
        }

        //return results
        return response()->json($arr);
    }

    public function newProductsForApp()
    {
        $products = Product::latest('id')->get();
        return response()->json($products);
    }

    public function mostDiscountedForApp()
    {
        $products = Product::orderBy('discount' , 'ASC')->get();
        return response()->json($products);
    }

    public function productsByPriceForApp(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'min_price' => 'required|numeric' ,
            'max_price' => 'required|numeric' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $products = Product::where('price' , '>=' , $request->min_price)->where('price' , '<=' , $request->max_price);

        if ($request->available == 1)
        {
            $products = $products->where('number' , '!=' , 0);
        }
        if ($request->discount == 1)
        {
            $products = $products->where('discount' , '<' , 1);
        }

        $products = $products->get();

        return response()->json($products);
    }

    public function productsByThirdCatForApp($main , $third , Request $request)
    {
        $validata = Validator::make($request->all() , [
            'min_price' => 'required|numeric' ,
            'max_price' => 'required|numeric' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }


        $products = Product::where('main_category_id' , $main)->where('third_category_id' , $third)
            ->where('final_price' , '>=' , $request->min_price)
            ->where('final_price' , '<=' , $request->max_price);

        if ($request->available == 1)
        {
            $products = $products->where('number' , '!=' , 0);
        }
        if ($request->discount == 1)
        {
            $products = $products->where('discount' , '<' , 1);
        }

        if ($products->get()->isEmpty())
        {
            return new JsonResponse('محصولی یافت نشد' , 404);
        }
        else
        {
            $products = $products->get();
            //return results
            return response()->json($products);
        }

    }

    public function searchForApp(Request $request , Product $product)
    {

        $validata = Validator::make($request->all() , [
            'min_price' => 'required|numeric' ,
            'max_price' => 'required|numeric' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $product = $product->where('final_price' , '>=' , $request->min_price)
                 ->where('final_price' , '<=' , $request->max_price);

        //checking inputs
        if ($request->has('title'))
        {
            $product = $product->where('title', 'LIKE' , '%' .$request->title. '%');
        }

        if ($request->available == 1)
        {
            $product = $product->where('number' , '!=' , 0);
        }
        if ($request->discount == 1)
        {
            $product = $product->where('discount' , '<' , 1);
        }

        if ($product->get()->isEmpty())
        {
            return new JsonResponse('محصولی یافت نشد' , 404);
        }
        else
        {
            $product = $product->get();
            //return results
            return response()->json($product);
        }
    }
}
