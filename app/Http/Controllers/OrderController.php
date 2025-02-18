<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->save();

        foreach ($request->books as $book) {
            $orderBook = new OrderBook();
            $orderBook->order_id = $order->id;
            $orderBook->book_id = $book['id'];
            $orderBook->quantite = $book['quantite'];
            $orderBook->save();
        }

        return back();
    }
}