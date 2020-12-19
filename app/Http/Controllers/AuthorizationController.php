<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\PostController;

class AuthorizationController extends Controller
{

    public function authorization(Request $request)
    {
        $user = new User();
        $user = User::where('login', $request->login)->first();
        if (!empty($user)) {
            if (password_verify($request->password, $user->password)) {
                $role = $user->getRole;
                $request->session()->put('role', $role->role);
                $request->session()->put('auth', true);
                $request->session()->put('login', $request->login);
                $request->session()->put('id', $user->id);
                $request->session()->save();
                $result = 'Вы успешно авторизовались на сайте, теперь вы можете оставлять комментарии к постам!';
                return view('authorization.authorization', ['result' => $result]);
            } else {
                $result = "Неправильно введены логин или пароль!";
                return view('authorization.authorization', ['result' => $result]);
            }
        } else {
            $result = "Неправильно введены данные!";
            return view('authorization.authorization', ['result' => $result]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('main');
    }
}
