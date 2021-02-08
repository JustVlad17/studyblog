<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{

    public function regUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('user.regUser');
        }

        if ($request->isMethod('post')) {
            $user = new User();

            if ($this->checkLogin($request->login) && $this->checkPassword($request->password)) {
                if ($this->checkMatch($request->login)) {
                    $false = 'Такой логин уже существует!';
                    return view('user.regUser', ['false' => $false]);
                } else {
                    $user->login = $request->login;
                    $user->password = $this->hash($request->password);
                    if ($this->createAdmin()) {
                        $user->role_id = 1;
                    }
                    $user->save();

                    return view('user.regSuccessesfully', ['login' => $user->login]);
                }
            } else {
                $false = 'Неправильно введены данные!';
                return view('user.regUser', ['false' => $false]);
            }
        }
    }

    private function checkLogin($login)
    {
        if (preg_match('#^[A-Za-z0-9]{5,15}$#', $login) > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function checkPassword($password)
    {
        if (preg_match('#^[A-Za-z0-9]{8,20}$#', $password) > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function hash($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }

    private function checkMatch($login)
    {
        $user = new User();
        $user = User::where('login', $login)->first();
        if (!empty($user)) {
            return true;
        } else {
            return false;
        }
    }

    private function createAdmin()
    {
        $user = DB::table('users')->first();
        if (empty($user)) {
            return true;
        } else {
            return false;
        }
    }
}
