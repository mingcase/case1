<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userList(Request $request) {
        $userList = DB::table('users')->inRandomOrder(10)->join('departments', 'users.department_id', '=', 'departments.id')->select('users.id', 'users.name', 'users.email', 'users.department_id', 'departments.title as department_name')->addSelect(DB::raw("'password' as password"))->limit(10)->get();

        return response()->json($userList, 200);
    }
}
