<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Product::query()
        ->material($request);
        return $data->get();
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
          
          $data = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'discount' => $request->get('discount'),
            'image' => $request->get('image'),
            'size' => $request->get('size'),
            'color' => $request->get('color'),
            'category' => $request->get('category'),
            'brand_id' => $request->get('brand_id'),
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
        $data = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand_name')->where('products.id','=',$id)->first();
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
        $data = Product::findOrFail($id);
        $request->validate([
        'name' => 'required|max:255',
        'origin' => 'required'
        ]);
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->discount = $request->get('discount');
        $data->image = $request->get('image');
        $data->size = $request->get('size');
        $data->color =$request->get('color');
        $data->category = $request->get('category');
        $data->brand_id = $request->get('brand_id');
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
        $data = Product::findOrFail($id);
        $data->delete();
        return response()->json($data::all());
    }
}
