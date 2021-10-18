<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    public function branchesList() {
        $branchesList = DB::table('branches')->select('id', 'title', 'status')->get();
        return response()->json($branchesList);
    }}
