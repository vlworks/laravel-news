<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, $this->ValidateRules(), [], $this->attributeNames());
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                $request->session()->flash('success', 'Данные пользователя успешно изменены');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('profile')->withErrors($errors);
        }

        return view('profile', ['user' => $user]);
    }

    protected function ValidateRules()
    {
        return [
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|min:3|string'
        ];
    }

    protected function attributeNames()
    {
        return [
          'newPassword' => 'Новый пароль'
        ];
    }
}
