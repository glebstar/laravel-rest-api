<?php

namespace App\Repositories;

use App\Entities\UserData as EntityUserData;
use App\Http\Requests\UpdateUserData;

class UserData extends EntityUserData
{
    public function updateData(UpdateUserData $request)
    {
        if (isset($request->name)) {
            $params = $this->params;
            $params['name'] = $request->name;
            $this->params = $params;
            $this->save();
        }

        if (isset($request->profession)) {
            $params = $this->params;
            $params['profession'] = $request->profession;
            $this->params = $params;
            $this->save();
        }

        if (isset($request->places)) {
            $params = $this->params;
            $params['places'] = $request->places;
            $this->params = $params;
            $this->save();
        }
    }
}
