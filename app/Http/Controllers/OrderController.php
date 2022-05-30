<?php

namespace App\Http\Controllers;

use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending(){
        $orders = ProductOrder::where('status','pending')
                                ->with('userInfo', 'productInfo')
                                ->paginate(20);
        return view('Admin.Order.pending', ['orders' => $orders]);
    }

    public function makeComplete($id){
        ProductOrder::where('id', $id)->update([
            'status' => 'complete'
        ]);
        return redirect()->back();
    }

    public function complete(Request $request){
        if (isset($request->start_date)){
            $start = $request->start_date;
            $end = $request->end_date;
            $orders = ProductOrder::where('status', 'complete')
                        ->whereBetween('created_at', [$start, $end])
                        ->with('userInfo', 'productInfo')
                        ->paginate(5);
            $orders->appends($request->all());
        }else{
            $orders = ProductOrder::where('status','complete')
                ->with('userInfo', 'productInfo')
                ->paginate(20);
        }
        return view('Admin.Order.complete', ['orders' => $orders]);
    }
}
