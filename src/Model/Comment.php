<?php

namespace MadeITBelgium\WPEloquent\Model;

use MadeITBelgium\WPEloquent\Traits\HasMeta;
use MadeITBelgium\WPEloquent\Model\Comment\Meta;

class Comment extends \Illuminate\Database\Eloquent\Model
{
    use HasMeta;

    protected $table = 'comments';
    protected $primaryKey = 'comment_ID';
    protected $fillable = [
        'comment_agent', 'comment_approved', 'comment_author', 'comment_author_IP', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_date', 'comment_date_gmt', 'comment_karma', 'comment_parent', 'comment_post_ID', 'comment_type', 'user_id',
    ];
    public $timestamps = false;

    const CREATED_AT = 'comment_date';

    public function post()
    {
        return $this->belongsTo(Post::class, 'comment_post_ID');
    }

    public function meta()
    {
        return $this->hasMany(Meta::class, 'comment_id')
            ->select(['comment_id', 'meta_key', 'meta_value']);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'ID', 'user_id');
    }
}
