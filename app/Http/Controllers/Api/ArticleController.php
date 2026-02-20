<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Keywords;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return ArticleResource::collection(
            Article::with(['keywords','category'])->latest()->get()
        )->additional([
            'categories' => Category::has('articles')->get(),
            'keywords' => Keywords::has('articles')->get(),
        ]);
    }
}
