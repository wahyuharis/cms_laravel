<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use League\CommonMark\Node\Block\Paragraph;

class TagsController extends Controller
{
    //
    function index(Request $request)
    {
        $view_data = [];

        $content = '';

        $content = view('admin_tags.tags');

        $view_data['title'] = "Tags";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function datatables()
    {
        $res = array();
        $res['data'] = array();

        $db = DB::table('post_tags')
            ->orderByDesc('id_post_tags')
            ->get();

        $dbres = array();
        foreach ($db as $row) {
            $buff = array();
            $buff[] = $row->id_post_tags;

            $buttons = '
            <div style="width:100px" >
            <a href="' . url('admin/tags/edit/' . $row->id_post_tags)
                . '" class="btn btn-sm btn-primary" >edit</a>
            
            <a class="btn btn-sm btn-danger"
                onclick="delete_handler(' . $row->id_post_tags . ')"
            >delete</a>
            </div>
            ';

            $buff[] = $buttons;
            $buff[] = $row->tags_name;
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
        $form['tags_name'] = '';
        if (!empty(trim($id))) {
            $db = DB::table('post_tags')
                ->where('post_tags.id_post_tags', '=', $id)
                ->first();

            $form['id'] = $id;
            $form['tags_name'] = $db->tags_name;
        }

        $content_data = array();
        $content_data['form'] = $form;

        $content = view('admin_tags.tags_edit', $content_data);

        $view_data['title'] = "Tags";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function submit(Request $request)
    {
        $data = array();
        $success = false;
        $message = "";


        if (strlen($request->input('tags_name')) > 4) {
            $success = true;
        } else {
            $success = false;
            $message .=   "<p>Tags Minimal 5 Karakter</p>";
        }

        if ($success) {
            $id = trim($request->input('id'));
            if (empty(trim($id))) {

                $insert['tags_name'] = trim($request->input('tags_name'));

                $db = DB::table('post_tags')->insert($insert);
            } else {

                $insert['tags_name'] = trim($request->input('tags_name'));

                $affected = DB::table('post_tags')
                    ->where('id_post_tags', $id)
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
        $delete = DB::table('post_tags')
            ->where('id_post_tags', $id)
            ->delete();

        return redirect('admin/tags/');
    }
}
