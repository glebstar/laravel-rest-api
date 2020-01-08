<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserData as UserDataResource;
use App\UserData;

class UserDataController extends Controller
{
    public function index()
    {
        $data = UserData::first();
        if ($data) {
            return new UserDataResource($data);
        }

        return response()->json([]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'params' => 'required|json',
        ]);

        $userData = UserData::create($data);

        return new UserDataResource($userData);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'params' => 'required|json',
        ]);

        $userData = UserData::findOrFail($id);

        $userData->update($data);

        return new UserDataResource($userData);
    }

    public function destroy($id)
    {
        $userData = UserData::findOrFail($id);
        $userData->delete();

        return response(null, 204);
    }
}
