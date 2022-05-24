<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    //
    function index(Request $request)
    {
        $view_data = [];
        $view_data['title'] = "Images";
        $view_data['content'] = view('admin_images.images');

        return view('admin.template', $view_data);
    }

    function upload(Request $request)
    {

        $image_name = '';
        if ($request->file('image')) {
            $file = $request->file('image');

            $tujuan_upload = 'general_upload';
            $image_name = "image-" . uniqid();
            $file->move($tujuan_upload, $image_name);

            $insert['images_name'] = $image_name;
            $db = DB::table('images')->insert($insert);
        }
    }

    function images_list()
    {
        $view_data = array();

        $db = DB::table('images')->orderByDesc('id_images')->get()->toArray();
        $view_data['images'] = $db;

        return view('admin_images.images_list', $view_data);
    }

    function image_delete($filename)
    {
        DB::table('images')->where('images_name','=',$filename)->delete();
        File::delete("general_upload/" . $filename);
    }
}
