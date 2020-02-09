<?php

namespace App\Http\Controllers;

use App\Product;
use App\SecondaryCategory;
use App\ThirdCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class searchController extends Controller
{
    public function search($table, $param , Request $request)
    {
        $res = DB::table($table);
        $res = $res->where($param , 'LIKE' , '%'.$request->q.'%')
            ->orderBy('id' , 'DESC')->get();

        if ($res->isEmpty())
        {
            return response()->json("نتیجه ای یافت نشد" , 404);
        }

        if ($table === 'orders')
        {
            $arr = []; $i = 0;
            foreach ($res as $order)
            {
                $arr[$i]['order'] = $order;
                $arr[$i]['date'] = Jalalian::forge($order->created_at)->format('%A, %d %B %y');
                $arr[$i]['time'] = Jalalian::forge($order->created_at)->format('H:i:s');
                $i++;
            }
            return response()->json($arr);
        }

        if ($table === 'products')
        {

            foreach ($res as $item)
            {
                $item->images = explode(',' , $item->product_img);
                unset($item->product_img);
            }
            return response()->json($res);
        }

        return response()->json($res);
    }

    public function deleteEverything($table , $id)
    {
        $item = DB::table($table)->where('id' , $id);

        if ($item->delete())
        {
            if ($table === 'orders')
            {
                DB::table('order_product')->where('order_id' , $id)->delete();
            }
            if ($table === 'main_categories')
            {
                SecondaryCategory::where('main_category_id' , $id)->delete();
                ThirdCategory::where('main_category_id' , $id)->delete();
                Product::where('main_category_id' , $id)->delete();
            }
            if ($table === 'secondary_categories')
            {
                ThirdCategory::where('secondary_category_id' , $id)->delete();
                Product::where('secondary_category_id' , $id)->delete();
            }
            return 'this item is deleted successfully';
        }

        return 'This item could not be deleted';
    }
}
