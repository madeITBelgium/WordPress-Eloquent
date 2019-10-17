<?php

namespace MadeITBelgium\WPEloquent\Model;

class Attachment extends Post
{
    protected $appends = ['real_url'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_parent', 'ID');
    }

    public function getRealUrlAttribute()
    {
        $filename = optional($this->meta()->where('meta_key', '_wp_attached_file')->first())->meta_value;
        $filename = substr($filename, strripos($filename, '/') + 1);

        $url = $this->guid;

        $urlWithoutFile = substr($url, 0, strripos($url, '/'));

        if (strpos($urlWithoutFile, '/wp-content') > 0) {
            $urlWithoutFile = substr($url, 0, strpos($url, '/wp-content'));
        }

        $thumb = '';
        $metaData = unserialize(optional($this->meta()->where('meta_key', '_wp_attachment_metadata')->first())->meta_value);
        if (isset($metaData['sizes']['thumbnail']) && strpos($metaData['sizes']['thumbnail']['file'], '/') === false) {
            if (strpos($urlWithoutFile, 'wp-content') === false) {
                $thumb = $urlWithoutFile.'/wp-content/uploads/'.$metaData['file'];
            } else {
                $thumb = $urlWithoutFile.'/'.$metaData['file'];
            }
        } else if(isset($metaData['sizes']['thumbnail'])) {
            $thumb = $urlWithoutFile.'/'.$metaData['sizes']['thumbnail']['file'];
        }

        return $thumb;
    }
}
