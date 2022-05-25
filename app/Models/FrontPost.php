<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class FrontPost extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'id_post';

    function get_list_home()
    {
        $sql = "SELECT 
        post.`id_post`,
        post.`slug`,
        post.`title`,
        post.`image`,
        post.`content`,
        post.`id_post_category`,
        post.`post_date`,
        post.`id_users`,
        post.`active`,
        post.`deleted`,
        users.username
        -- GROUP_CONCAT(post_tags.tags_name) as tags
        FROM `post`
        left join users on users.id_users=post.id_users
        left join post_tags_rel on post_tags_rel.id_post=post.id_post
        left join post_tags on post_tags.id_post_tags=post_tags_rel.id_post_tags
        where 
        post.deleted= ?
        AND
        post.active= ?
        GROUP by post.id_post
        order by post.id_post desc
        limit 5";

        $result = DB::select($sql, [0, 1]);

        return $result;
    }
}
