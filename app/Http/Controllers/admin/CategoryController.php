<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    function index(Request $request)
    {
        $view_data = [];

        $content = '';

        $content = view('admin_category.category');

        $view_data['title'] = "Category";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function datatables()
    {
        $res = array();
        $res['data'] = array();

        $db = DB::table('post_category')
            ->orderByDesc('id_category')
            ->get();

        $dbres = array();
        foreach ($db as $row) {
            $buff = array();
            $buff[] = $row->id_category;

            $buttons = '
            <div style="width:100px" >
            <a href="' . url('admin/category/edit/' . $row->id_category)
                . '" class="btn btn-sm btn-primary" >edit</a>
            
            <a class="btn btn-sm btn-danger"
                onclick="delete_handler(' . $row->id_category . ')"
            >delete</a>
            </div>
            ';

            $buff[] = $buttons;
            $buff[] = $row->category_name;
            array_push($dbres, $buff);
        }

        $res['data'] = $dbres;

        return response()->json($res);
    }

    function edit($id = '')
    {
        $view_data = [];

        $content = '';


        $form = array();
        $form['id'] = '';
        $form['category_name'] = '';
        if (!empty(trim($id))) {
            $db = DB::table('post_category')
                ->where('post_category.id_category', '=', $id)
                ->first();

            $form['id'] = $id;
            $form['category_name'] = $db->category_name;
        }

        $content_data = array();
        $content_data['form'] = $form;

        $content = view('admin_category.category_edit', $content_data);

        $view_data['title'] = "Category";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function submit(Request $request)
    {
        $data = array();
        $success = false;
        $message = "";


        if (strlen($request->input('category_name')) > 4) {
            $success = true;
        } else {
            $success = false;
            $message = "Category Minimal 5 Karakter";
        }

        if ($success) {
            $id = trim($request->input('id'));
            if (empty(trim($id))) {

                $insert['category_name'] = trim($request->input('category_name'));

                $db = DB::table('post_category')->insert($insert);
            } else {

                $insert['category_name'] = trim($request->input('category_name'));

                $affected = DB::table('post_category')
                    ->where('id_category', $id)
                    ->update($insert);
            }
        }


        $res = array(
            'data' => $data,
            'success' => $success,
            'message' => $message
        );

        return response()->json($res);
    }

    function delete($id)
    {
        $deleted = DB::table('post_category')
            ->where('id_category', '=', $id)
            ->delete();

        return redirect('admin/category/');
    }
}
