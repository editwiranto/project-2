<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OrderData = Order::all();
        return view('ecommerce.order.order',compact('OrderData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_data = User::all();
        return view('ecommerce.order.addOrder',compact('user_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);

        try {
            $tData = new Order();
            $tData->user_id = $request->user_id;
            $tData->total = $request->total;
            $tData->status = $request->status;
            $tData->save();

            return redirect('order')->with('success', 'Berhasil Tambah Data');
        } catch (\Exception $e) {
            return redirect('order')->with('fail', $e->getMessage());
        }
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
    public function edit($id)
    {
        $user_data = User::all();
        $edit_data = Order::find($id);

        return view('ecommerce.order.editOrder',compact('user_data','edit_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);

        try {
            Order::where('id',$request->order_id)->update([
                'user_id' => $request->user_id,
                'total' => $request->total,
                'status' => $request->status
            ]);
            return redirect('order')->with('success', 'Berhasil Edit Data');
        } catch (\Exception $e) {
            return redirect('order')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Order::where('id',$id)->delete();

            return redirect('order')->with('success', 'Berhasil Hapus Data');
        } catch (\Exception $e) {
            return redirect('order')->with('fail', $e->getMessage());
        }
    }
}
