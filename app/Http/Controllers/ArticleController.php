<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
// app/Http/Controllers/ArticleController.php

public function index() 
{
    return view('articles_index', compact('articles'));
}

//
public function showByCategory($category) 
{
    $category = Category::findOrFail($category);
    $articles = Article::where('category_id', $category->id)->get();
    return view('articles_index', [ 'articles' => $articles, 'nameCategory' => $category->title ] ); 
}


    public function show($id) 
    {
        $article = Article::find($id);
        if ($article) {
            return response()->json($article);
        } else {
            return response()->json(['error' => 'Article non trouvé'], 404);
        }
    }

    public function store(Request $request) 
    {
        $dataValid = $this->validator($request->all());
        if ($dataValid->fails()) {
            return response()->json($dataValid->errors(), 400);
        }

        $article = Article::create([
            'label' => $request->label,
            'content' => $request->content ?? '',
            'price' => $request->price,
            'quantity' => $request->quantity ?? 0,
            'category_id' => $request->category_id
        ]);

        return response()->json($article, 201);
    }

    public function update(Request $request, $id)  
    {
        $dataValid = $this->validator($request->all());
        if ($dataValid->fails()) {
            return response()->json($dataValid->errors(), 400);
        }

        $article = Article::find($id);
        if ($article) {
            $article->update([
                'label' => $request->label,
                'content' => $request->content ?? '',
                'price' => $request->price,
                'quantity' => $request->quantity ?? 0,
                'category_id' => $request->category_id
            ]);
            return response()->json($article);
        } else {
            return response()->json(['error' => 'Article non trouvé'], 404);
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return response()->json(['message' => 'Article supprimé'], 200);
        } else {
            return response()->json(['error' => 'Article non trouvé'], 404);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'label' => ['required', 'string', 'max:50'],
            'content' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['nullable', 'integer'],
            'category_id' => ['required', 'integer']
        ]);
    }
}
