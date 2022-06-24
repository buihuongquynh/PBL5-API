<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('comments')
            ->join('products', 'comments.product_id', '=', 'products.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('users.name as username','users.avt', 'comments.*')->where('comments.product_id','=',$request->product_id)->get();
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
          $data = new Comment([
            'cmt' => $request->get('cmt'),
            'rate' => $request->get('rate'),
            'product_id' => $request->get('product_id'),
            'user_id' => $request->get('user_id'),
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
        $data = Comment::findOrFail($id);
        $data->cmt = $request->get('cmt');
        $data->rate = $request->get('rate');
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
        $data = Comment::findOrFail($id);
        $data->delete();
        return response()->json($data::all());
    }
}
