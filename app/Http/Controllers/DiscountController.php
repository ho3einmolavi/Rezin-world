<?php

namespace App\Http\Controllers;

use App\Discount;
use App\SpecialDiscount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class DiscountController extends Controller
{

    public function check()
    {
        $discount = Discount::latest('id')->first();
        $special = SpecialDiscount::latest('id')->first();

        if (!$special)
        {
            if (!$discount)
            {
                return response()->json([
                    'discount' => 'در این زمان تخفیفی وجود ندارد'  ,
                    'check' => 0
                ]);
            }
            else
            {
                return response()->json([
                    'discount' => 'شما میتوانید از کد تخفیف استفاده کنید'  ,
                    'check' => 1
                ]);
            }
        }
        else
        {
            return response()->json([
                'discount' => 'شما میتوانید از '.$special->amount.' تومان تخفیف برای سفارش های بالای '.$special->limit.' تومان استفاده کنید که در زمان انتخاب شیوه پرداخت اعمال خواهد شد'  ,
                'check' => 2
            ]);
        }
    }

    public function use(Request $request)
    {
        $user = auth()->user();
        $validata = Validator::make($request->all() , [
            'name' => 'required' ,
            'base' => 'required'
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $discount = Discount::where('name' , $request->name)->first();

        if (! $discount)
        {
            return response()->json('این کد تخفیف معتبر نیست' , 404);
        }

        $check = DB::table('discount_user')->where('user_id' , $user->id)
            ->where('discount_id' , $discount->id)->first();

        if ($check)
        {
            return response()->json('این کد تخفیف برای شما فعال نیست' , 400);
        }


        $cost = (100 - $discount->amount) * ($request->base) / 100;

        if ($cost < 1000)
        {
            $cost = 1000;
            $user->discounts()->attach($discount);
            return response()->json($cost);
        }
        else
        {
            $user->discounts()->attach($discount);
            return response()->json(round($cost));
        }
    }

    public function create(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'name' => 'required|unique:discounts' ,
            'amount' => 'required|numeric|min:0|max:100' ,
            'expire' => 'required|date' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

       $discount = Discount::create([
           'name' => $request->name ,
           'amount' => $request->amount ,
           'expire' => $request->expire ,
        ]);

        return new JsonResponse($discount);
    }

    public function index()
    {
        $off = Discount::orderBy('id' , 'DESC')->get();
        $arr = [];
        foreach ($off as $item)
        {
            $date = Jalalian::forge($item->expire)->format('%A, %d %B %y');
            $arr[] = [$item , $date];
        }

        return response()->json($arr);
    }

}
