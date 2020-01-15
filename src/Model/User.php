<?php

namespace MadeITBelgium\WPEloquent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MadeITBelgium\WPEloquent\Traits\HasMeta;
use MadeITBelgium\WPEloquent\Traits\HasRoles;
use MadeITBelgium\WPEloquent\Model\User\Meta;

class User extends Authenticatable
{
    use HasMeta, HasRoles, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $hidden = [
        'user_pass',
        'user_activation_key',
    ];

    protected $fillable = [
        'user_login', 'user_nicename', 'user_email', 'user_url', 'user_pass', 'user_registered', 'user_activation_key', 'user_status', 'display_name',
    ];

    const CREATED_AT = 'user_registered';

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_author')
                    ->where('post_status', 'publish')
                    ->where('post_type', 'post');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function meta()
    {
        return $this->hasMany(Meta::class, 'user_id')
                    ->select(['user_id', 'meta_key', 'meta_value']);
    }
}
