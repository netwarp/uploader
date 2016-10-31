<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Video extends Model
{
	use \Conner\Tagging\Taggable;
    protected $table = 'videos';

    public function user() {

        return $this->belongsTo('App\User');
    }

    public function comments() {

    }
}
