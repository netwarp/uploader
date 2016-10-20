<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Video extends Model
{
    protected $table = 'videos';

    public function user() {
        return $this->belongsTo('User');
    }

    public function comments() {

    }
}
