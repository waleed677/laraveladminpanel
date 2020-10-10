<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;

class filesController extends Controller
{


    function addCategory()
    {
        $data = DB::table('category')->get()->all();
        return view('addCategory', ['data' => $data]);
    }


    function index()
    {

        $data = DB::table('category')->get()->all();
        return view('upload', ['data' => $data]);
    }

    function insert(Request $request)
    {

        $request->validate([
            'category' => 'required|min:4'
        ]);

        $category = $request->get('category');
        DB::table('category')->insert([
            'c_name' => $category
        ]);
        return redirect('addCategory')->with('message', 'Category Has been Added Successfully');
    }



    function upload(Request $request)
    {
        $path = "uploadedFiles";
        if ($request->submit == 'Upload') {
            $request->validate([
                'title' => 'required|min:4',
                'category' => 'required',
                'type' => 'required',
                'file' => 'required'
            ]);

            $title = $request->get('title');
            $category = $request->get('category');
            $type = $request->get('type');
            $file = $request->file('file')->storeAs('uploadedFiles', $title . '.' . $request->file('file')->extension());

            DB::table('files')->insert([
                'f_title' => $title,
                'f_type' => $type,
                'c_id' => $category,
                'location' => $file,
                'date' => now()
            ]);
            return redirect('upload')->with('message', 'Files Has been Uploaded Successfully');
        }
    }

    function delete($id)
    {
        $data = DB::table('files')
            ->where('f_id', '=', $id)
            ->delete();
        return redirect('dashboard');
    }

    function deleteCategory($id)
    {
        $query = "DELETE category,files FROM category
                 LEFT JOIN files
                 ON category.c_id = files.c_id
                 WHERE category.c_id = '$id'";
        DB::statement($query);
        return redirect('addCategory');
    }

    function edit($id)
    {
        $data = DB::table('files')
            ->join('category', 'files.c_id', '=', 'category.c_id')
            ->select('files.*', 'category.c_name')
            ->where('f_id', '=', $id)
            ->first();
        $category = DB::table('category')->get()->all();

        return view('edit', ['data' => $data, 'category' => $category]);
    }

    function editCategory($id)
    {
        $data = DB::table('category')
            ->where('c_id', '=', $id)
            ->first();
        return view('editCategory', ['data' => $data]);
    }

    function update(Request $request)
    {

        $request->validate([
            'title' => 'min:4',
        ]);

        $id = $request->get('id');
        $title = $request->get('title');
        $category = $request->get('category');
        $type = $request->get('type');

        $tit = explode(' ', $title);
        $imageTitle = join("_", $tit);

        if ($request->file('file') != "") {
            echo "here";
            $file = $request->file('file')->storeAs('uploadedFiles',  $imageTitle . '.' . $request->file('file')->extension());
        } else {
            echo "here2";
            $file = $request->get('fileValue');
        }

        $data = array(
            'f_title' => $title,
            'f_type'  => $type,
            'location' => $file,
            'c_id' => $category,
            'date' => now()
        );

        DB::table('files')
            ->where('f_id', '=', $id)
            ->update($data);

        return redirect('files/' . $id . '/edit')->with('message', 'Update Sucessfully!');
    }


    function updateCategory(Request $request)
    {

        $request->validate([
            'cname' => 'min:4',
        ]);

        $id = $request->get('id');
        $cname = $request->get('cname');
        DB::table('category')
            ->where('c_id', '=', $id)
            ->update(['c_name' => $cname]);

        return redirect('category/' . $id . '/edit')->with('message', 'Update Sucessfully!');
    }
}
