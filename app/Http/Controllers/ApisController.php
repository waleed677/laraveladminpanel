<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApisController extends Controller
{
    function getAll(Request $request)
    {
        $data = array();

        $data['data'] = DB::table('files')->get()->all();


        (count($data['data'])) ? $data['response'] = 1 : $data['response'] = 0;
        return response()->json($data, 200);
    }

    function getAllCategory(Request $request)
    {
        $data = array();
        $data['data'] = DB::table('category')->get()->all();
        (count($data['data'])) ? $data['response'] = 1 : $data['response'] = 0;
        return response()->json($data, 200);
    }

    function getAllByCategory($id)
    {
        $data = array();
        $data['data'] = DB::table('files')
            ->where('c_id', '=', $id)
            ->get();

        (count($data['data'])) ? $data['response'] = 1 : $data['response'] = 0;
        return response()->json($data, 200);
    }

    function getAllByType($type)
    {
        $data = array();
        $data['data'] = DB::table('files')
            ->where('f_type', '=', $type)
            ->get();
        (count($data['data'])) ? $data['response'] = 1 : $data['response'] = 0;
        return response()->json($data, 200);
    }
}
