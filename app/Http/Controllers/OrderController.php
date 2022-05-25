<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreOrderRequest $request)
    {
        return $request->store();
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
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
