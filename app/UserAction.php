<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];

    function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }


    public function setActionIdAttribute($input)
    {
        $this->attributes['action_id'] = $input ? $input : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
