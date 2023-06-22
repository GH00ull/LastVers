<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Brand;
use App\Models\City;
use App\Models\Showroom;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //  TODO РАБОТА С АВТОСАЛОНОМ + ПРИ ОДОБРЕНИИ ОТПРАВЛЯТЬ СООБЩЕНИЯ 
    // TODO работа с объявлениями
    //  TODO выходной документ где будет выводить все объявления (по определнным котегориям)
    public function show()
    {
        $user = User::all()->count();
        $post = Ads::all()->count();
        $Showroom = Showroom::all()->count();
        return view('admin.home', compact('user', 'post', 'Showroom'));
    }
    public function user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }
    public function userupdate($id)
    {
        $user = User::find($id);
        return view('admin.userUpdate', compact('user'));
    }
    public function userDElite($id)
    {
        $user = User::find($id)->delete();
        return redirect(route('admin'));
    }
    public function userupdateEnd($id, Request $request)
    {
        if ($user = User::find($id)) {
            $valid = $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'telegram' => 'nullable|string|max:255',
                'phone' => 'required|',
                'role_id' => 'required',
            ]);


            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'middle_name' => $request->middle_name,
                'phone' => $request->phone,
                'telegram' => $request->telegram,
                'email' => $request->email,
                'role_id' => $request->role_id,
            ]);
            $request->session()->flash('registration_completed', 'Все хорошо');
            return redirect(route('admin'));
        } else {
            $request->session()->flash('registration_completed', 'ошибка на нашей сторонне так что сори');
            return redirect(route('admin'));
        }
    }
    public function showroom()
    {
        $redi = Showroom::where('published', '1')->get();
        $notredi = Showroom::where('published', '0')->get();
        return view('admin.showroom', compact('redi', 'notredi'));
    }
    public function categori()
    {
        $city = City::all();
        $brand = Brand::all();
        return view('admin.city', compact('city', 'brand'));
    }
    public function CreateCity(Request $request)
    {
        $city = $request->validate([
            'name' => 'required'
        ]);
        City::create($city);
        return redirect()->route('admin.city');
    }
    public function DeliteCity($id)
    {

        City::find($id)->delete();

        return redirect()->route('admin.city');
    }
    public function CreateBrand(Request $request)
    {

        $city = $request->validate([
            'name' => 'required'
        ]);
        Brand::create($city);
        return redirect()->route('admin.city');
    }
    public function DeliteBrand($id)
    {
        // TODO web
        Brand::find($id)->delete();

        return redirect()->route('admin.city');
    }
    public function Ads()
    {
        $ads = Ads::all();
      
        return view('admin.ads', compact('ads'));
    }
}