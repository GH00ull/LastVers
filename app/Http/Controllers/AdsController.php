<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function creat(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'main_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'city' => 'required',
            'condition' => 'required',
        ]);

        // dd($valid);


        if ($request->hasFile('main_image')) {
            // Имя и расширение файла
            $filenameWithExt = $request->file('main_image')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $request->file('main_image')->getClientOriginalExtension();
            // Путь для сохранения
            $fileNameToStore = "main_image/" . $filename . "_" . time() . "." . $extention;
            // Сохраняем файл
            $path = $request->file('main_image')->storeAs('public/', $fileNameToStore);
            // dd($valid);

            Ads::create([
                'title' => $valid['title'],
                'brand' => $valid['brand'],
                'description' => $valid['description'],
                'price' => $valid['price'],
                'city' => $valid['city'],
                'state' => $valid['condition'],
                'mileage' => $valid['mileage'],
                'id_users' => Auth::id(),
                'photo' => $fileNameToStore,
            ]);
        }

        return redirect()->route('home');

    }

}