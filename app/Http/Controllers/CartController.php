<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.*')->where('carts.user_id','=',$request->userId)->get();
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
          
          $data = new Cart([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id')
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
        $data = Cart::findOrFail($id);
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
        $data = Cart::findOrFail($id);
        // $request->validate([
        // 'name' => 'required|max:255',
        // 'origin' => 'required'
        // ]);

        $data->name = $request->get('user_id');
        $data->origin = $request->get('product_id');

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
        $data = Cart::findOrFail($id);
        $data->delete();
        return response()->json($data::all());
    }
}
