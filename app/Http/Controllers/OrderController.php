<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    public function addArticlesToOrder(Request $request)
    {
        // Validation de la requête
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'article_ids' => 'required|array',
            'article_ids.*' => 'exists:articles,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);
    
        // Trouver l'utilisateur et sa commande non confirmée ou en créer une
        $user = User::findOrFail($validatedData['user_id']);
        $order = $user->orders()->where('is_confirmed', false)->first();
    
        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0,
                'total_quantity' => 0,
                'is_confirmed' => false,
            ]);
        }
    
        foreach ($validatedData['article_ids'] as $index => $articleId) {
            $article = Article::findOrFail($articleId);
            $quantity = $validatedData['quantities'][$index];
    
            // Vérifier si l'article est déjà dans la commande
            $existingArticle = $order->articles()->where('article_id', $articleId)->first();
    
            if ($existingArticle) {
                // Mettre à jour la quantité de l'article existant
                $existingArticle->pivot->quantity += $quantity;
                $existingArticle->pivot->save();
            } else {
                // Attacher l'article à la commande avec les détails
                $order->articles()->attach($article->id, [
                    'label' => $article->label,
                    'price' => $article->price,
                    'quantity' => $quantity,
                ]);
            }
    
            // Mettre à jour les totaux de la commande
            $order->total_price += $article->price * $quantity;
            $order->total_quantity += $quantity;
        }
    
        $order->save();
    
        return redirect()->back();
    }

    public function removeArticlesToOrder(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'article_id' => 'required|integer|exists:articles,id',
        ]);
    
        $order = Order::findOrFail($validatedData['order_id']);
        $article = $order->articles()->where('article_id', $validatedData['article_id'])->firstOrFail();
    
        // Mettre à jour les totaux de la commande
        $order->total_price -= $article->pivot->price * $article->pivot->quantity;
        $order->total_quantity -= $article->pivot->quantity;
    
        // Détacher l'article de la commande
        $order->articles()->detach($validatedData['article_id']);
    
        // Sauvegarder la commande
        $order->save();
    
        return redirect()->back()->with('success', 'Article removed successfully.');
    }

    public function confirmOrder(Request $request) 
    {
        $validatedData = $request->validate([
            'order_id' =>'required|integer|exists:orders,id',
        ]);

        $order = Order::findOrFail($validatedData['order_id']);
        if ($order->total_quantity > 0) {
            $order->is_confirmed = true;
            $order->save();
            return redirect('/')->with('success', 'Order confirmed successfully.');
        } else {
            return redirect()->back()->with('error', 'Vous ne pouvez pas confirmer une commande sans articles.');
        }
    }
    
    
    public function showOrderView($userId, $category)
    {
        $user = User::findOrFail($userId);
        $order = $user->getOrCreateUnconfirmedOrder();
        $category = Category::findOrFail($category);
        $articles = Article::where('category_id', $category->id)->get();
        
        // Récupérer les articles de la commande
        $orderArticles = $order->articles()->withPivot('quantity', 'price', 'label')->get();
    
        // Passez les données de la commande et les articles à la vue
        return view('articles_index', [
            'order' => $order, 
            'articles' => $articles, 
            'orderArticles' => $orderArticles, 
            'nameCategory' => $category->title
        ]);
    }
    
}

