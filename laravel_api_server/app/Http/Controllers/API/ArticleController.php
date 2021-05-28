<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Article;
use App\Http\Resources\ArticleResource;
use Validator;

class ArticleController extends BaseController
{
    public function index()
    {
        $articles = Article::all();

        return $this->sendResponse(ArticleResource::collection($articles), 'Articles retrieved successfully.');
    }

    public function show($id)
    {
        $article = Article::find($id);

        if (is_null($article)) {
            return $this->sendError('Article not found');
        }
        return $this->sendResponse(new ArticleResource($article), 'Product retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $article = Article::create($input);

        return $this->sendResponse(new ArticleResource($article), 'Product created successfully.');
    }

    public function update(Request $request, Article $article)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $article->title = $input['title'];
        $article->body = $input['body'];
        $article->save();

        return $this->sendResponse(new ArticleResource($article), 'Article updated successfully');
    }

    public function delete(Article $article)
    {
        $article->delete();

        return $this->sendResponse([], 'Article deleted successfully.');
    }
}
