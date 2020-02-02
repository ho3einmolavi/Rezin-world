<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class OrderController extends Controller
{
    public function verify($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'تایید شد'
        ]);

        return new JsonResponse('ok');
    }

    public function create(Request $request)
    {
        $user = auth()->user();
        $validData = Validator::make($request->all() ,[
            'total' => 'required|numeric' ,
            'products' => 'required' ,
        ]);

        if ($validData->fails())
        {
            return new JsonResponse($validData->errors()->all() , 400);
        }

        $order = Order::create([
            'user_id' => $user->id ,
            'total' => $request->total ,
            'explanation' => $request->explanation ,
            'tracking_code' => Str::random(3).''.rand(10000 , 99999) ,
        ]);

        $products = $request->products;
        foreach ($products as $product) {
            $item = Product::find($product['id']);
            $order->products()->attach($item);
            DB::table('order_product')->where('order_id', $order->id)
                ->where('product_id', $item->id)
                ->update([
                    'number' => $product['order_number'],
                    'price' => $item->price,
                    'title' => $item->title,
                    'discount' => ($item->price) - ($item->final_price),
                    'total' => $product['final_price1']
                ]);

            if (DB::table('products')->where('id', $item->id)->first()->number === 0)
            {
                DB::table('products')->where('id', $item->id)
                    ->update([
                        'number' => 0
                    ]);
            }
            else
            {
                if (($item->number) - ( $product['order_number']) < 0)
                {
                    DB::table('products')->where('id', $item->id)
                        ->update([
                            'number' => 0 ,
                        ]);
                }
                else
                {
                    DB::table('products')->where('id' , $item->id)
                        ->update([
                            'number' => ($item->number) - ($product['order_number']) ,
                            'sale' => ($item->sale) + ( $product['order_number'])
                        ]);
                }
            }
        }

        return response()->json(['order' => $order ,
            'date' => Jalalian::forge($order->created_at)->format('%A, %d %B %y'),
            'time' =>  Jalalian::forge($order->created_at)->format('H:i:s')]);
    }

    public function index()
    {
        $orders = Order::latest('id')->get();
        $arr = []; $i = 0;

        foreach ($orders as $order)
        {
            $arr[$i]['order'] = $order;
            $arr[$i]['date'] = Jalalian::forge($order->created_at)->format('%A, %d %B %y');
            $arr[$i]['time'] = Jalalian::forge($order->created_at)->format('H:i:s');
            $i++;
        }

        return response()->json($arr);
    }

    public function show($id , Request $request)
    {
        $user = auth()->user();
        $order = Order::find($id);

        if ($order)
        {
            if ($order->user->id === $user->id || $user->type === 'admin')
            {
                foreach ($order->products as $product)
                {
                    $productsID[] = $product['id'];
                }
                $res = $this->find($order['id'] , $productsID);

                unset($order['user']);
                unset($order['products']);
                return new JsonResponse([
                    'message' => "it's ok" ,
                    'tracking_code' => $order->tracking_code ,
                    'order' => $order ,
                    'user' => $order->user ,
                    'products' => $res ,
                    'check' => 1
                ] , 200);

            }
            else
            {
                return new JsonResponse("شما اجازه دسترسی به این صفحه را ندارید" , 401);
            }
        }
        else
        {
            return new JsonResponse("order not found" , 404);
        }

    }

    public function userOrders()
    {
        $user = auth()->user();
        return new JsonResponse($user->orders()->latest('id')->get());
    }

    public function find($order , array $products)
    {
        $results = DB::table('order_product')->whereIn('product_id' , $products);
        $results = $results->where('order_id' , $order);
        return ($results->get());
    }
}
