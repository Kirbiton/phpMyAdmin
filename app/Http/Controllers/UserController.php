<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'pincode' =>  'required|string|min:8',
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user ->update($request->all());
        
        return response()->json($user);
    }    

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null,204)
    }


}
