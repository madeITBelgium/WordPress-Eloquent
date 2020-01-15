<?php

namespace MadeITBelgium\WPEloquent\Model\Post;

use MadeITBelgium\WPEloquent\Model\Post;

class Meta extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'postmeta';
    public $timestamps = false;
    protected $fillable = ['post_id', 'meta_key', 'meta_value'];
    protected $primaryKey = 'meta_id';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
