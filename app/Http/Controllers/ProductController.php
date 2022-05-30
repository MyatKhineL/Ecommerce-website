<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categoryInfo')->latest('id')->paginate(10);
        return view('Admin.Product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::latest('id')->get();
        return view('Admin.Product.create', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            "name" => "required|",
            "price" => "required|",
            "description" => "required|",
            "image" => "required|mimes:png, jpg, jpeg",
        ]);

        $file = $request->file('image');
        $file_name = uniqid(time()).$file->getClientOriginalName();
        $file_path = 'image/'.$file_name;
        $file->storeAs('image', $file_name);

        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = uniqid(time())."_".Str::slug($request->name);
        $product->image =  $file_path;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->view_count = 0;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Admin.Product.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::latest('id')->get();
        return view('Admin.Product.edit', ['product' => $product, 'cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Check choose image
        if ($request->file('image')){
            $image_arr = explode('/', $request->image); // remove 'image/' folder , that is [0]
            Storage::disk('image')->delete($image_arr[0]);

            // make new image_name
            $file = $request->file('image');
            $file_name = uniqid(time()).$file->getClientOriginalName();
            $file_path = 'image/'.$file_name;
            $file->storeAs('image', $file_name);

        }else{
            $file_path = $product->image;
        }

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = uniqid(time())."_".Str::slug($request->name);
        $product->image =  $file_path;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->update();

        return redirect()->route('product.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image_arr = explode('/', $product->image); // remove 'image_name' , that is [1]
        Storage::disk('image')->delete($image_arr[1]);
        $product->delete();
        return redirect()->route('product.index');
    }
}
