<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{

    public function index($id)
    {
        return new OrderResource(Order::findOrFail($id));
    }

    public function store(StoreOrderRequest $request)
    {
        return new OrderResource($request->store());
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $credentails = $request->validated();
        $order = Order::find($credentails['id']);
        return $order->update($credentails);
    }

    public function destroy(Order $order, int $id)
    {
        return $order->destroy($id);
    }
}
