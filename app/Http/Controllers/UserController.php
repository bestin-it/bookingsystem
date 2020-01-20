<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users= User::all();

        return response()->json([ 'data' => $users ], 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json([ 'data' => $user ], 200);
    }

    public function store(Request $request)
    {
        $values = $request->only('name', 'email', 'password');

        $user = User::create($values);
        
        return response()->json(['message' => 'User is correctly added'], 201);
    }

    public function update(Request $request, $id)
    {
        $user= User::find($id);
        $user->save();

        return response()->json(['message' => 'The user has been updated'], 200);
    }

    public function destroy($id)
    {
        $user= User::find($id);

        return response()->json([ 'message' => 'The user has been deleted'], 200);
    }
}
