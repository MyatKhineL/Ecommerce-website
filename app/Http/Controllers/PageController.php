<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

// Page Management
    public function index(){
        $products = Product::latest('id')->paginate(9);
        return view('Users.index', ['products' => $products]);
    }

    public function productDetail($slug){
        // Update
        $product = Product::where('slug', $slug)->with('categoryInfo')->first();
        $view =  $product->view_count+1;
        $product->view_count = "$view";
        $product->update();
        return view('Users.detail', ['product'=>$product]);
    }

// Page By Category Management
    public function byCategory($slug){
        $category_id = Category::where('slug', $slug)->first()->id;
        $products = Product::where('category_id', $category_id)->with('categoryInfo')->paginate(9);
        return view('Users.index', ['products' => $products]);
    }

// Page By Search Management
    public function bySearch(Request $request){
        $search = $request->search;
        $products = Product::where('name', 'like',"%$search%")->with('categoryInfo')->paginate(9);
        $products->appends($request->all());
        return view('Users.index', ['products' => $products]);
    }

// Add To Cart Management
    public function addToCart($slug){
        if (Auth::id() !== null){
            $user_id = Auth::id();
            $product_id = Product::where('slug', $slug)->first()->id;
            $quantity = 1;

            $product_cart = new ProductCart();
            $product_cart->user_id = $user_id;
            $product_cart->product_id = $product_id;
            $product_cart->quantity = $quantity;
            $product_cart->save();
        }
        return redirect()->back();
    }

    public function showCart(){
        $carts = ProductCart::with('userInfo', 'productInfo')
                                ->where('user_id', Auth::id())
                                ->latest('id')
                                ->paginate(10);
        return view('Users.cart', ['carts' => $carts]);
    }

    public function makeOrder(){
        $user_id = Auth::id();
        $carts = ProductCart::where('user_id', $user_id)
                            ->get();
        foreach ($carts as $cart){
            $product_order = new ProductOrder();
            $product_order->user_id = $user_id;
            $product_order->product_id = $cart->product_id;
            $product_order->quantity = $cart->quantity;
            $product_order->save();
            ProductCart::where('id', $cart->id)->delete();
        }
        return redirect()->back();
    }

// Order Management
    public function showPendingOrder(){
        $orders = ProductOrder::where('user_id', Auth::id())
                                ->where('status', 'pending')
                                ->with('userInfo', 'productInfo')
                                ->latest('id')
                                ->paginate(10);
        $status = "pending";
        return view('Users.Order.order', ['orders'=>$orders, 'status'=>$status]);
    }

    public function showCompleteOrder(){
        $orders = ProductOrder::where('user_id', Auth::id())
                                ->where('status', 'complete')
                                ->with('userInfo', 'productInfo')
                                ->latest('id')
                                ->paginate(10);
        $status = "complete";
        return view('Users.Order.order', ['orders'=>$orders, 'status'=>$status]);
    }


// ================================================================================================================

// For Admin Dashboard
    public function home(){
        $date = date('Y-m-d');
        $user_count = User::count();
        $pending_count = ProductOrder::where('status', 'pending')
                            ->whereDate('created_at', $date)
                            ->count();
        $complete_count = ProductOrder::where('status', 'complete')
                            ->whereDate('updated_at', $date)
                            ->count();
        $orders = ProductOrder::with('userInfo', 'productInfo')
//                    ->whereDate('created_at', $date)
                    ->latest('id')
                    ->paginate(20);
        return view('Admin.index',[
            'date' => $date,
            'user_count' => $user_count,
            'pending_count' => $pending_count,
            'complete_count' => $complete_count,
            'orders' => $orders
        ]);
    }

    public function allUsers(){
        $users = User::latest('id')->withCount('orderInfo')->paginate(20);
        return view('Admin.users.index', ['users' => $users]);
    }
}
