<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    function index()
    {
        $data = DB::table('files')
            ->join('category', 'files.c_id', '=', 'category.c_id')
            ->select('files.*', 'category.c_name')
            ->get();


        return view('dashboard', ['data' => $data]);
    }
}
