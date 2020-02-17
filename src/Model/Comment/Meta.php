<?php

namespace MadeITBelgium\WPEloquent\Model\Comment;

use MadeITBelgium\WPEloquent\Model\Comment;

class Meta extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'commentmeta';
    public $timestamps = false;
    protected $fillable = ['meta_key', 'meta_value', 'comment_id'];
    protected $primaryKey = 'meta_id';

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
