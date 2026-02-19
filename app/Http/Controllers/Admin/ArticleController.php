<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Keywords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index')->with([
            'articles' => Article::with(['category','keywords'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $keywords = Keywords::all();
        return view('admin.articles.create')->with([
            'categories' => $categories,
            'keywords' => $keywords
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['picture'] = $this->saveImage($request->file('picture'));
            $article = Article::create($data);
            $article->keywords()->sync($request->keywords_id);

            return redirect()->route('admin.articles.index')->with([
                'success' => 'Article created succesfully'
                ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $keywords = Keywords::all();
        return view('admin.articles.edit')->with([
            'categories' => $categories,
            'keywords' => $keywords,
            'article' => $article,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
        if($request->validated()){
            $data = $request->validated();
            if($request->has('picture')){
                $this->removePictureFromStorage($article->picture);
                $data['picture'] = $this->saveImage($request->file('picture'));
            }
            $article->update($data);
            $article->keywords()->sync($request->keywords_id);

            return redirect()->route('admin.articles.index')->with([
                'success' => 'Article updated succesfully'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function saveImage($file){
        $image_name = time().'-'.$file->getClientOriginalName();
        $file->storeAs('images/articles',$image_name,'public');
        return 'storage/images/articles/'.$image_name;
    }

    public function removePictureFromStorage($file){
        $path = public_path($file);
        if(File::exists($path)){
            File::delete($path);
        }
    }
}
