<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::latest() -> paginate(5);

        return view('orders.index', [
            'orders' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Order::find($id);

        return view ('orders.detail', [
            'order' => $data
        ]);
    }

    public function add()
    {
        $data = [
            ["id" => 1, "name" => "Electronic Devices"],
            ["id" => 2, "name" => "Furniture"],
        ];

        return view ('orders.add', [
            'categories' => $data
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $order = new Order;
        $order -> title = request() -> title;
        $order -> body = request() -> body;
        $order -> category_id = request() -> category_id;
        $order -> save();

        return redirect ('/orders');
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order -> delete();

        return redirect ('/orders') -> with ('info', 'Order deleted');
    }
}
