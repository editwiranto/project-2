<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = orderitem::all();
        return view('ecommerce.orderitem.orderitem',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = User::all();
        $order_id = Order::all();
        $product_id = Product::all();
        return view('ecommerce.orderitem.addOrderitem',compact('order_id', 'product_id','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'order_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
        ]);

        try {
            $tdata = new OrderItem();
            $tdata->user_id = $request->user_id;
            $tdata->order_id = $request->order_id;
            $tdata->product_id = $request->product_id;
            $tdata->quantity = $request->quantity;
            $tdata->save();

            return redirect('orderitem')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('orderitem')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user_id = User::all();
        $product_id = Product::all();
        $order_id = Order::all();
        $orderitem = OrderItem::find($id);

        return view('ecommerce.orderitem.editOrderItem',compact('user_id','product_id','order_id','orderitem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'order_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
        ]);

        try {
            OrderItem::where('id',$request->id)->update([
                'user_id' => $request->user_id,
                'order_id' => $request->order_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
            return redirect('orderitem')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('orderitem')->with('fail', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            OrderItem::where('id',$id)->delete();
            return redirect('orderitem')->with('success', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect('orderitem')->with('fail', $e->getMessage());
        }
    }
}
