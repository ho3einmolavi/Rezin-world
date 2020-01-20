<?php

namespace App\Http\Controllers;

use App\SpecialDiscount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialDiscountController extends Controller
{
    public function use(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'base' => 'required|numeric' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $discount = SpecialDiscount::latest('id')->first();
        if (! $discount)
        {
            return response()->json('تخفیفی وجود ندارد' , 404);
        }

        $amount = $discount->amount;
        $limit = $discount->limit;
        if ($request->base >= $limit)
        {
            $cost = $request->base - $amount;
            return new JsonResponse($cost);
        }

        return response()->json("این تخفیف برای سفارش های {$limit} تومان به بالاست" , 400);
    }

    public function index()
    {
        $offs = SpecialDiscount::latest('id')->get();

        return response()->json($offs);
    }

    public function create(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'amount' => 'required|numeric' ,
            'limit' => 'required|numeric'
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $off = SpecialDiscount::create([
            'amount' => $request->amount ,
            'limit' => $request->limit ,
        ]);

        return new JsonResponse('discount is added');
    }
}
