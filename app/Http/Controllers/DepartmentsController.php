<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function departmentsList() {
        $departmentList = DB::table('departments')->select('id', 'title', 'status')->get();
        return response()->json($departmentList);
    }
}
