<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class PostController extends Controller
{
    function index(Request $request)
    {
        // Str::slug

        $view_data = [];

        $content = '';

        $content = view('admin_post.post');

        $view_data['title'] = "Post";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }

    function datatables(Request $request)
    {
        $post_model = new Post();

        // dd($_REQUEST);

        $search = '';
        if ($request->input('search')['value']) {
            $search = $request->input('search')['value'];
        }

        $item_start = $request->input('start');
        $item_end = $request->input('length');

        $data = $post_model->get_list($search, $item_start, $item_end);

        $count = $post_model->get_count($search, $item_start, $item_end);

        $total_row = ($count[0]->totalrow);

        $res = array();
        $res['data'] = array();

        $dbres = array();
        foreach ($data as $row) {
            $buff = array();
            $buff[] = $row->id_post;

            $buttons = '
            <div style="width:100px" >
            <a href="' . url('admin/post/edit/' . $row->id_post)
                . '" class="btn btn-sm btn-primary" >edit</a>
            
            <a class="btn btn-sm btn-danger"
                onclick="delete_handler(' . $row->id_post . ')"
            >delete</a>
            </div>
            ';

            $buff[] = $buttons;
            $buff[] = $row->slug;
            $buff[] = $row->title;
            $buff[] = $row->category_name;

            if (!empty(trim($row->image))) {
                $image_url = '<img src="' . url('upload/' . $row->image) . '" style="height:80px" >';
            } else {
                $image_url = '';
            }
            $buff[] = $image_url;

            $buff[] = $row->tanggal_post;

            $active_state = '<span class="badge badge-primary">Posted</span>';
            $notactive_state = '<span class="badge badge-dark">Draft</span>';
            if ($row->active == 1) {
                $buff[] = $active_state;
            } else {
                $buff[] = $notactive_state;
            }

            // $buff[] = $row->active;

            array_push($dbres, $buff);
        }

        // "recordsTotal": 57,
        //   "recordsFiltered": 57,
        $res['data'] = $dbres;
        $res['recordsTotal'] = $total_row;
        $res['recordsFiltered'] = $total_row;

        return response()->json($res);
    }

    function edit($id = '')
    {
        $view_data = [];

        $content = '';

        $form = array();
        $form['id'] = '';
        $form['slug'] = '';
        $form['title'] = '';
        $form['content'] = '';
        $form['tags'] = array();
        $form['image'] = '';
        $form['id_post_category'] = '';
        $form['post_date'] = '';
        $form['active'] = '';

        $form['opt_active'] = array(
            1 => 'publish',
            2 => 'draft',
        );

        $form['opt_category'] = array();
        $db1 = DB::table('post_category')->get()->toArray();
        $form['opt_category'] = $db1;


        $db2 = DB::table('post_tags')->get()->toArray();
        $form['opt_tags'] = $db2;

        if (!empty(trim($id))) {
            $db = DB::table('post')
                ->where('post.id_post', '=', $id)
                ->first();

            $date = DateTime::createFromFormat('Y-m-d H:i:s', $db->post_date);
            $post_date_ymd = $date->format('Y-m-d');

            $form['id'] = $id;
            $form['slug'] = $db->slug;
            $form['title'] = $db->title;
            $form['content'] = $db->content;
            $form['tags'] = DB::table('post_tags_rel')->where('id_post', $id)->get()->toArray();
            $form['image'] = $db->image;
            $form['id_post_category'] = $db->id_post_category;
            $form['post_date'] = $post_date_ymd;
            $form['active'] = $db->active;
        }

        $content_data = array();
        $content_data['form'] = $form;

        $content = view('admin_post.post_edit', $content_data);

        $view_data['title'] = "Post";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function submit(Request $request)
    {
        $data = array();
        $success = false;
        $message = "";

        // dd($_POST);

        $validation_rule = array();
        if (empty(trim($request->input('id')))) {
            $validation_rule['title'] = 'required|unique:post,title|max:255';
            $validation_rule['slug'] = 'required|unique:post,slug|max:255';
            $validation_rule['id_post_category'] = 'required';
            $validation_rule['content'] = 'required|min:5';
            $validation_rule['post_date'] = 'required';
            $validation_rule['active'] = 'required';
        } else {
            $validation_rule['title'] = 'required|max:255';
            $validation_rule['slug'] = 'required|max:255';
            $validation_rule['id_post_category'] = 'required';
            $validation_rule['content'] = 'required|min:5';
            $validation_rule['post_date'] = 'required';
            $validation_rule['active'] = 'required';
        }

        $validator = Validator::make($request->all(), $validation_rule);

        if ($validator->passes()) {
            $success = true;
        } else {
            $success = false;
            $err = $validator->errors()->all();
            foreach ($err as $err_msg) {
                $message .= '' . $err_msg . "<br>";
            }
        }


        $image_name = '';
        if ($request->file('image')) {
            $file = $request->file('image');

            $tujuan_upload = 'upload';
            $image_name = "image-" . uniqid();
            $file->move($tujuan_upload, $image_name);
        }

        // echo "<pre>";
        // dd($request->input('tags'));
        // die();

        if ($success) {
            $id = trim($request->input('id'));
            if (empty(trim($id))) {

                $insert['title'] = trim($request->input('title'));
                $insert['slug'] = trim($request->input('slug'));
                $insert['id_post_category'] = trim($request->input('id_post_category'));
                $insert['content'] = trim($request->input('content'));
                $insert['post_date'] = trim($request->input('post_date'));
                $insert['active'] = trim($request->input('active'));
                $insert['image'] = $image_name;
                $insert['id_users'] = $request->session()->get('id_users');

                $db = DB::table('post')->insert($insert);

                $insert_id = DB::getPdo()->lastInsertId();
                // dd($insert_id);

                $deleted = DB::table('post_tags_rel')->where('id_post', '=',  $insert_id)->delete();
                if (is_array($request->input('tags'))) {
                    $tags = $request->input('tags');
                    foreach ($tags as $tagsrow) {
                        $insert2 = array();

                        $insert2['id_post'] = $insert_id;
                        $insert2['id_post_tags'] = $tagsrow;

                        $db = DB::table('post_tags_rel')->insert($insert2);
                    }
                }
            } else {

                $insert['title'] = trim($request->input('title'));
                $insert['slug'] = trim($request->input('slug'));
                $insert['id_post_category'] = trim($request->input('id_post_category'));
                $insert['content'] = trim($request->input('content'));
                $insert['post_date'] = trim($request->input('post_date'));
                $insert['active'] = trim($request->input('active'));

                if (!empty(trim($image_name))) {
                    $insert['image'] = $image_name;
                }

                $insert['id_users'] = $request->session()->get('id_users');


                $affected = DB::table('post')
                    ->where('id_post', $id)
                    ->update($insert);

                $deleted = DB::table('post_tags_rel')->where('id_post', '=',  $id)->delete();
                if (is_array($request->input('tags'))) {
                    $tags = $request->input('tags');
                    foreach ($tags as $tagsrow) {
                        $insert2 = array();

                        $insert2['id_post'] = $id;
                        $insert2['id_post_tags'] = $tagsrow;

                        $db = DB::table('post_tags_rel')->insert($insert2);
                    }
                }
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
        $delete = DB::table('post')
            ->where('id_post', $id)
            ->update(["deleted" => 1]);

        return redirect('admin/post/');
    }
}
