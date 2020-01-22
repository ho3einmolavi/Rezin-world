<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'body' => 'required' ,
            'product_id' => 'required' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $user = auth()->user();
        if ($user)
        {
            $comment = Comment::create([
                'user_id' => $user->id ,
                'body' => $request->body ,
                'product_id' => $request->product_id
            ]);
            return response()->json([
                'status' => 'created' ,
                'comment' => $comment ,
            ]);
        }
        else
        {
            $comment = Comment::create([
                'user_id' => null ,
                'body' => $request->body ,
                'product_id' => $request->product_id
            ]);

            return response()->json([
                'status' => 'created' ,
                'comment' => $comment ,
            ]);
        }



        return response()->json([
            'status' => 'created' ,
            'comment' => $comment ,
            'user' => "{$user->first_name} {$user->last_name}"
        ]);
    }

    public function index($product_id)
    {
        $product = Product::find($product_id);

        $comments = $product->comments();

        $comments = $comments->where('verify' , 1)->get();

        if ($comments->isEmpty())
        {
            return response()->json([
                'status' => 'not found any comment for this product'
            ] , 404);
        }

        foreach ($comments as $comment)
        {
            if ($comment['user_id'])
            {
                $comment['user'] = $comment->user;
            }
            else
            {
                $comment['user'] = null;
            }
        }

        return response()->json($comments);
    }

    public function verify($id)
    {
        $comment = Comment::find($id);

        $comment->update([
            'verify' => 1
        ]);

        return response()->json([
            'status' => 'comment is verified' ,
            'comment' => $comment
        ]);
    }

    public function allComments()
    {
        $comments = Comment::orderBy('verify' , 'DESC')->get();

        foreach ($comments as $comment)
        {
            if ($comment['user_id'])
            {
                $comment['user'] = $comment->user;
            }
            else
            {
                $comment['user'] = null;
            }
        }
        return response()->json($comments);
    }
}
