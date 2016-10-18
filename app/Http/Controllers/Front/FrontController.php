<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;

class FrontController extends Controller
{
    public function getIndex() {
    	$user = User::findOrFail(5);
        $user->password = bcrypt('azeaze');
        $user->save();
    }
}
