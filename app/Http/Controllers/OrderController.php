<?php

namespace App\Http\Controllers;
use App\Models\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'origin' => 'required'
        //   ]);
          $data = new Order([
            'product_id'=> $request->get('product_id'),
            'user_id'=> $request->get('user_id'),
            'status'=> $request->get('status'),
            'shipping_address'=> $request->get('shipping_address'),
          ]);
      
          $data->save();
      
          return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Order::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Order::findOrFail($id);
        // $request->validate([
        // 'name' => 'required|max:255',
        // 'origin' => 'required'
        // ]);
        $data->product_id = $request->get('product_id');
        $data->user_id = $request->get('user_id');
        $data->status = $request->get('status');
        $data->shipping_address = $request->get('shipping_address');

        $data->save();

    return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::findOrFail($id);
        $data->delete();
        return response()->json($data::all());
    }
}
