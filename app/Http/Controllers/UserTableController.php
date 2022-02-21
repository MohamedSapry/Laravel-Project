<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Area;

class UserTableController extends Controller
{
    //

    public function getAllUsersData(){
        $usersData = Address::join('users', 'users.id', '=', 'addresses.user_id')
                            ->join('areas', 'areas.id', '=', 'addresses.area_id')
                            ->paginate(10);
        return response()->json($usersData, 200);
    }
}
