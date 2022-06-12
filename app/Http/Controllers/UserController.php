<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::query()
        ->role($request);
        return $user->get();
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
          $data = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'date_of_birth' => $request->get('date_of_birth'),
            'gender' => $request->get('gender'),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),
            'password' => $request->get('password'),
            'role' => $request->get('role')
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
        $data = User::findOrFail($id);
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
        $data = User::findOrFail($id);
        // $request->validate([
        // 'name' => 'required|max:255',
        // 'origin' => 'required'
        // ]);
        $data->name =  $request->get('name');
        $data->email =  $request->get('email');
        $data->date_of_birth =  $request->get('date_of_birth');
        $data->gender =  $request->get('gender');
        $data->phone_number =  $request->get('phone_number');
        $data->address =  $request->get('address');
        $data->password =  $request->get('password');
        $data->role =  $request->get('role');
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
        $data = User::findOrFail($id);
        $data->delete();
        return response()->json($data::all());
    }
}
