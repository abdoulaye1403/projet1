<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\userResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(userResource::collection($users));
    }

    public function show(Request $request, User $user){
        return response()->json(new userResource($user));
    }

    public function store(StoreUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);
        $data = [
            'message' => 'utilisateur creer avec succes',
            'data'=> new userResource($user)
        ];
        return response()->json($data,201);
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'role_id' => $request->role_id ?? $user->role_id,
            'password' => $request->password ? Hash::make($request->password):$user->password
        ]);
        $data = [
            'message' => 'utilisateur modifie avec succes',
            'data'=> new userResource($user)
        ];
        return response()->json($data,201);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json('utilisateur supprime avec succes');
    }
}
