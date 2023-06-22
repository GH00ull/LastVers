<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Ads;
use App\Models\Brand;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

// TODO НАСТРОИТЬ ЧТО БЫ ПОЛЬЗОВАТЕЛЬ МОГ СОЗДАТЬ ТОЛЬКО 2 ОБЪВЛЕНИЯ 
// TODO + СОЗДАТЬ ИЗМЕНЕНИЯ АКАУНТА
class AdsController extends Controller
{
    public function creat(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'mileage' => 'required',
            'price' => 'required',
            'description' => 'required',
            'city' => 'required',
            'condition' => 'required',
            'images' => 'required',
        ]);


        if ($request->hasFile('images')) {
            // dd('все работает');
            $images = $request->file('images');
            $imagePaths = [];

            // Сохранение каждого файла на локальном сервере
            foreach ($images as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('images'), $filename);

                $imagePaths[] = 'images/' . $filename;
            }

            $imageData = json_encode(
                $imagePaths
            );
            // dd($imageData);
            $createdAds = [
                'title' => $valid['title'],
                'id_brand' => $valid['brand'],
                'description' => $valid['description'],
                'price' => $valid['price'],
                'id_city' => $valid['city'],
                'state' => $valid['condition'],
                'mileage' => $valid['mileage'],
                'id_users' => Auth::id(),
                'photo' => $imageData,
            ];
            Ads::create($createdAds);
            return redirect()->route('home');
        }


    }

    public function Showone($id)
    {
        $ads = Ads::find($id);
        $photo=$ads->photo;
        $user = User::find($ads->id_users);
        $brand = Brand::find($ads->id_brand);
        $city = City::find($ads->id_city);
        return view('ads.showone', compact('ads', 'user', 'brand', 'city','photo'));
    }

    public function deliteAds($id)
    {
        Ads::find($id)->delete();
        // {
        //     $mailData = [
        //         "title" => "ВЫ удалили свое объяввление",
        //         "dob" => date('Y-m-d H:i:s'),
        //     ];

        //     Mail::to("islam200378@gmail.com")->send(new TestEmail($mailData));

        //     dd("Mail Sent Successfully!");
        // } ;

        return redirect()->route('show.user');
    }
}