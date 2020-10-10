<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class dashboardController extends Controller
{
    function index()
    {
        $data = array();
        $data['total'] = $this->getHeader();
        $data['files'] = DB::table('files')
            ->join('category', 'files.c_id', '=', 'category.c_id')
            ->select('files.*', 'category.c_name')
            ->get();
        return view('dashboard', ['data' => $data]);
    }


    function getHeader()
    {
        $data = array();


        $totalFiles = DB::table('files')->get()->all();
        $data['totalFiles'] = count($totalFiles);

        $totalcategories = DB::table('category')->get()->all();
        $data['totalcategories'] = count($totalcategories);

        $totalImages = DB::table('files')
            ->where('f_type', '=', 'Image')
            ->get();
        $data['totalImages'] = count($totalImages);

        $totalAudio = DB::table('files')
            ->where('f_type', '=', 'Audio')
            ->get();
        $data['totalAudio'] = count($totalAudio);

        return $data;
    }
}
