<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Newsletter;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        try {
            $menu = Article::where('category_id', 1)->get();
            $userSession = Auth::user();
            $news = Newsletter::where('email', $userSession->email)->first();
            $user = User::findOrFail($userSession->id);
            $orders = Order::where('user_id', $user->id)
                ->with(['articles' => function($query) {
                    $query->withPivot('label', 'price', 'quantity', 'created_at', 'updated_at');
                }])
                ->get();

            return view('dashboard', ['orders' => $orders, 'menu' => $menu, 'news' => $news]);
        } catch (\Exception $e) {
            // Gérer l'exception et rediriger ou retourner une réponse d'erreur appropriée
            return response()->json(['error' => 'Erreur lors du chargement du tableau de bord.', 'message' => $e->getMessage()], 500);
        }
    }
}
