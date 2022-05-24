<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use stdClass;
use Validator;
// Validator


class UserController extends Controller
{
    //
    function index(Request $request)
    {
        $view_data = [];

        $content = '';

        $content = view('admin_users.users');

        $view_data['title'] = "User";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }

    function datatables()
    {
        $res = array();
        $res['data'] = array();

        $db = DB::table('users')
            ->orderByDesc('id_users')
            ->get();

        $dbres = array();
        foreach ($db as $row) {
            $buff = array();
            $buff[] = $row->id_users;

            $buttons = '
            <div style="width:100px" >
            <a href="' . url('admin/user/edit/' . $row->id_users)
                . '" class="btn btn-sm btn-primary" >edit</a>
            
            <a class="btn btn-sm btn-danger"
                onclick="delete_handler(' . $row->id_users . ')"
            >delete</a>
            </div>
            ';

            $buff[] = $buttons;
            $buff[] = $row->username;
            $buff[] = $row->email;
            $buff[] = '';

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
        $form['username'] = '';
        $form['email'] = '';
        $form['password'] = '';
        $form['password2'] = '';
        $form['role'] = '';


        $opt_role = DB::table('users_role')->get();
        $form['opt_role'] = $opt_role;


        if (!empty(trim($id))) {
            $db = DB::table('users')
                ->where('users.id_users', '=', $id)
                ->first();

            $form['id'] = $id;
            $form['username'] = $db->username;
            $form['email'] = $db->email;
            $form['role'] = $db->role;
            $form['password'] = '';
            $form['password2'] = '';
        }

        // dd($form['opt_role']);


        $content_data = array();
        $content_data['form'] = $form;

        $content = view('admin_users.users_edit', $content_data);

        $view_data['title'] = "User";
        $view_data['content'] = $content;

        return view('admin.template', $view_data);
    }
    function submit(Request $request)
    {
        $data = array();
        $success = false;
        $message = "";

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
        ]);


        $validation_rule = array();
        if (empty(trim($request->input('id')))) {
            $validation_rule['username'] = 'required|unique:users,username|max:255';
            $validation_rule['email'] = 'required|unique:users,email|max:255';
            $validation_rule['password'] = 'required|min:5';
        } else {
            $validation_rule['username'] = 'required|max:255';
            $validation_rule['email'] = 'required|max:255';
            $validation_rule['password'] = '';
        }

        $validator = Validator::make($request->all(), $validation_rule);

        if ($validator->passes()) {
            $success = true;
        } else {
            $success = false;
            $err = $validator->errors()->all();
            foreach ($err as $err_msg) {
                $message .= '' . $err_msg . "\n";
            }
        }


        if ($success) {
            $id = trim($request->input('id'));
            if (empty(trim($id))) {

                $insert['username'] = trim($request->input('username'));
                $insert['email'] = trim($request->input('email'));
                $insert['role'] = trim($request->input('role'));
                $insert['password'] = Hash::make(trim($request->input('password')));

                $db = DB::table('users')->insert($insert);
            } else {

                $insert['username'] = trim($request->input('username'));
                $insert['email'] = trim($request->input('email'));
                $insert['role'] = trim($request->input('role'));


                if (!empty(trim($request->input('password')))) {
                    $insert['password'] = Hash::make(trim($request->input('password')));
                }

                $affected = DB::table('users')
                    ->where('id_users', $id)
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
}
