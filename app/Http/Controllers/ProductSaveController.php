<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductSaveRequest;
use App\Http\Requests\UpdateProductSaveRequest;
use App\Models\ProductSave;

class ProductSaveController extends Controller
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
     * @param  \App\Http\Requests\StoreProductSaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSaveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSave  $productSave
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSave $productSave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSave  $productSave
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSave $productSave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSaveRequest  $request
     * @param  \App\Models\ProductSave  $productSave
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSaveRequest $request, ProductSave $productSave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSave  $productSave
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSave $productSave)
    {
        //
    }
}
