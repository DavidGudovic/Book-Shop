<?php

namespace App\Http\Controllers\Resources;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\OrderService;

/*
 Resource controller for Models\Order
*/
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('orders.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order,User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order,User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order,User $user)
    {
        //
    }
}
