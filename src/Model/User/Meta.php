<?php

namespace MadeITBelgium\WPEloquent\Model\User;

use MadeITBelgium\WPEloquent\Model\User;

class Meta extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'usermeta';
    public $timestamps = false;
    protected $fillable = ['meta_key', 'meta_value', 'user_id'];
    protected $primaryKey = 'umeta_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
