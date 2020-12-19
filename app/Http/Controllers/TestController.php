<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {
        $user = DB::table('users')->first();
        dump(empty($user));
        if (empty($user)) {
            return true;
        } else {
            return false;
        }
    }
}
