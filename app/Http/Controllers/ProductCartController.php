<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCartRequest;
use App\Http\Requests\UpdateProductCartRequest;
use App\Models\ProductCart;

class ProductCartController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCart $productCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCart $productCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCartRequest  $request
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCartRequest $request, ProductCart $productCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCart  $productCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCart $productCart)
    {
        //
    }
}
