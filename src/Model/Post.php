<?php

namespace MadeITBelgium\WPEloquent\Model;

use MadeITBelgium\WPEloquent\Traits\HasMeta;
use MadeITBelgium\WPEloquent\Model\Post\Meta;
use MadeITBelgium\WPEloquent\Model\Term\Taxonomy;
use MadeITBelgium\WPEloquent\Model\Term\Relationships;

class Post extends \Illuminate\Database\Eloquent\Model
{
    use HasMeta;

    protected $table = 'posts';
    protected $primaryKey = 'ID';
    protected $post_type = null;
    public $timestamps = false;

    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    protected $fillable = [
        'post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_password', 'post_name', 'to_ping', 'pinged', 'post_modified', 'post_modified_gmt', 'post_content_filtered', 'post_parent', 'guid', 'menu_order,', 'post_type', 'post_mime_type', 'comment_count',
    ];

    public function newQuery()
    {
        $query = parent::newQuery();
        if ($this->post_type) {
            return $this->scopeType($query, $this->post_type);
        }

        return $query;
    }

    public function author()
    {
        return $this->hasOne(User::class, 'ID', 'post_author');
    }

    public function meta()
    {
        return $this->hasMany(Meta::class, 'post_id')
                    ->select(['post_id', 'meta_key', 'meta_value']);
    }

    public function terms()
    {
        return $this->hasManyThrough(
                Taxonomy::class,
                Relationships::class,
                'object_id',
                'term_taxonomy_id'
            )->with('term');
    }

    public function categories()
    {
        return $this->terms()->where('taxonomy', 'category');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'post_parent', 'ID')->where('post_type', 'attachment');
    }

    public function tags()
    {
        return $this->terms()->where('taxonomy', 'post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_post_ID');
    }

    public function scopeStatus($query, $status = 'publish')
    {
        return $query->where('post_status', $status);
    }

    public function scopeType($query, $type = 'post')
    {
        return $query->where('post_type', $type);
    }

    public function scopePublished($query)
    {
        return $query->status('publish');
    }
}
