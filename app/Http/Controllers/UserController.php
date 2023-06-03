<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function CreateUser(Request $request)
    {
        $valid = $request->validate(
            [
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'password' => 'required|string|min:6',
                'email' => 'required|email|unique:users|max:255',
                'telegram' => 'nullable|string|max:255',
                'phone' => 'required|regex:/^\+7[0-9]{10}$/',
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'telegram' => $request->telegram,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if ($user) {
            $request->session()->flash('registration_completed', 'Регистрация завершена успешно!');
            return redirect(route('login'));
        } else {
            $request->session()->flash('registration_completed', 'ошибка на нашей сторонне так что сори');
            return redirect(route('registration'));
        }
        ;
    }
    public function LoginUser(Request $request)
    {
        $valid = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($user)) {
            $request->session()->flash('registration_completed', 'вы успешно вошьли');
            return redirect()->route('home');
        } else {
            $request->session()->flash('registration_completed', 'ой ошибка');
            return redirect()->route('login');
        }
    }
    public function showUser()
    {
        // TODO ВЫВОДИТЬ СТАРНИЦУ
        $id = Auth::id();
        dd(User::find($id));

    }
    public function showUserPost()
    {
        // TODO ВЫВОДИТЬ ОБЪЯВЛЕНИЯ 
        $id = Auth::id();
        dd(Ads::where('id_users' , $id)->get());
        dd(DB::table('ads')->where('id_users', '1'));

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}