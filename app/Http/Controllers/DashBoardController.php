<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $userSession = Auth::user();
        $user = User::findOrFail($userSession->id);
        $orders = Order::where('user_id', $user->id)
        ->with(['articles' => function($query) {
            $query->withPivot('label', 'price', 'quantity', 'created_at', 'updated_at');
        }])
        ->get();
    
        return view('dashboard', ['orders' => $orders]);
    }
}