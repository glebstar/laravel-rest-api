<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserData as UserDataResource;
use App\Repositories\UserData;
use App\Http\Requests\StoreUserData;
use App\Http\Requests\UpdateUserData;

class UserDataController extends Controller
{
    public function index()
    {
        return new UserDataResource(UserData::first());
    }

    public function store(StoreUserData $request)
    {
        $userData = new UserData();
        $userData->user_id = 1;
        $userData->params = $request->all();
        $userData->save();

        return new UserDataResource($userData);
    }

    public function update(UserData $userData, UpdateUserData $request)
    {
        $userData->updateData($request);
        return new UserDataResource($userData);
    }

    public function destroy(UserData $userData)
    {
        $userData->delete();

        return new UserDataResource($userData);
    }
}
