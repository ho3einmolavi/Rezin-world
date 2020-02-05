<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('updated_at')->get();
        foreach ($articles as $article)
        {
            $article['date'] = Jalalian::forge($article->updated_at)->format('%A, %d %B %y');
        }
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $articles = Article::latest('id')->take(4)->get();
        foreach ($articles as $article)
        {
            $article['date'] = Jalalian::forge($article->created_at)->format('%A, %d %B %y');
        }
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validata = Validator::make($request->all() , [
            'title' => 'required|unique:articles' ,
            'body' => 'required' ,
            'keywords' => 'required' ,
            'cover' => 'nullable|image' ,
        ]);

        if ($validata->fails())
        {
            return new JsonResponse($validata->errors()->all() , 400);
        }

        $user = auth()->user();

        if ($request->hasFile('cover'))
        {
            $file = $request->file('cover');
            $name2 = $file->getClientOriginalName();
            $name2 = time().'_'.$name2;
            $file->move(public_path('/images/articles') , $name2);

            $article = Article::create([
                'title' => $request->title ,
                'user_id' => $user->id ,
                'body' => $request->body ,
                'keywords' => $request->keywords ,
                'cover' => $name2 ,
            ]);
        }
        else
        {
            $article = Article::create([
                'title' => $request->title ,
                'user_id' => $user->id ,
                'body' => $request->body ,
                'keywords' => $request->keywords ,
                'cover' => 'default.png'
            ]);
        }

        return response()->json($article);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param  \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function update($id ,Request $request)
    {
        $article = Article::find($id);
        $user = auth()->user();
        if ($request->has('title'))
        {
            $validata = Validator::make($request->all() , [
                'title' => 'required' ,
                'body' => 'required' ,
                'keywords' => 'required' ,
                'cover' => 'nullable|image' ,
            ]);
            $checkTitle = Article::where('title' , $request->title)->first();
            $error = [];
            if ($checkTitle)
            {
                if ($checkTitle->id == $article->id)
                {
                    if ($validata->fails())
                    {
                        return new JsonResponse(array_merge($error , $validata->errors()->all()) , 400);
                    }
                    if ($request->hasFile('cover'))
                    {
                        $file = $request->file('cover');
                        $name2 = $file->getClientOriginalName();
                        $name2 = time().'_'.$name2;
                        $file->move(public_path('/images/articles') , $name2);
                        $article->update([
                            'title' => $request->title ,
                            'user_id' => $user->id ,
                            'body' => $request->body ,
                            'keywords' => $request->keywords ,
                            'cover' => $name2 ,
                        ]);
                    }
                    else
                    {
                        $article->update([
                            'title' => $request->title ,
                            'user_id' => $user->id ,
                            'body' => $request->body ,
                            'keywords' => $request->keywords ,
                            'cover' => 'default.png'
                        ]);
                    }
                }
                else
                {
                   $error = ['این عنوان قبلا انتخاب شده است'];
                    if ($validata->fails())
                    {
                        return new JsonResponse(array_merge($error , $validata->errors()->all()) , 400);
                    }
                    else return new JsonResponse($error , 400);
                }
            }
            else
            {
                if ($validata->fails())
                {
                    return new JsonResponse(array_merge($error , $validata->errors()->all()) , 400);
                }
                if ($request->hasFile('cover'))
                {
                    $file = $request->file('cover');
                    $name2 = $file->getClientOriginalName();
                    $name2 = time().'_'.$name2;
                    $file->move(public_path('/images/articles') , $name2);
                    $article->update([
                        'title' => $request->title ,
                        'user_id' => $user->id ,
                        'body' => $request->body ,
                        'keywords' => $request->keywords ,
                        'cover' => $name2 ,
                    ]);
                }
                else
                {
                    $article->update([
                        'title' => $request->title ,
                        'user_id' => $user->id ,
                        'body' => $request->body ,
                        'keywords' => $request->keywords ,
                        'cover' => 'default.png'
                    ]);
                }
            }
        }

        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
