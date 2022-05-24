<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    use HasFactory;

    function get_list($search = '', $start = 0, $limit = 5)
    {


        $sql = "SELECT 
        `id_post`,
        `slug`,
        `title`,
        post_category.category_name ,
        `image`,
        DATE_FORMAT(post_date,'%Y-%m-%d') as tanggal_post,
        `active`
        FROM `post` 
        JOIN post_category on post_category.id_category=post.id_post_category
        WHERE post.deleted=0 
        and (
            post.slug like ? or
            post.title like ? or
            post_category.category_name like ? or
            DATE_FORMAT(post_date,'%Y-%m-%d') like ?
        )
        order by post.id_post desc
        
        limit " . intval($start) . ", " . intval($limit) . "
        ";
        // echo "<pre>";
        // echo $sql;
        // die();
        $results = DB::select($sql, ["%" . $search . "%", "%" . $search . "%", "%" . $search . "%", "%" . $search . "%"]);

        return $results;
    }

    function get_count($search = '', $start = 0, $limit = 5)
    {


        $sql = " SELECT count(post.id_post) as totalrow from `post` 
        JOIN post_category on post_category.id_category=post.id_post_category
        WHERE post.deleted=0 
        and (
            post.slug like ? or
            post.title like ? or
            post_category.category_name like ? or
            DATE_FORMAT(post_date,'%Y-%m-%d') like ?
        )        
        ";

        $results = DB::select($sql, ["%" . $search . "%", "%" . $search . "%", "%" . $search . "%", "%" . $search . "%"]);

        return $results;
    }
}
