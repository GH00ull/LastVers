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


            // Сохранение каждого файла на локальном сервере
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $filename);
                $imagePaths[] = $path;
            }

            // Сохранение информации о файлах в базе данных
            $imageData = [
                'images' => $imagePaths
            ];

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