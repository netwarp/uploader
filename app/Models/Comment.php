<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
    	'user_name',
    	'video_id',
    	'content'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function video() {
        return $this->belongsTo('App\Models\Video');
    }
}
