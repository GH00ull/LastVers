<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowroomController extends Controller
{
    // todo создание объявления + выходной документ по автомобилям 
    public function created(Request $request)
    {
        if (
            (Showroom::where(
                'user_id',
                Auth::id()
            )->get()) == true
        ) {


            $valid = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'tagline' => 'required',
            ]);

            if ($request->hasFile('images')) {
                // dd('все работает');
                $images = $request->file('images');
                $imagePaths = [];

                // Сохранение каждого файла на локальном сервере
                foreach ($images as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $path = $image->storeAs('images', $filename);
                    $imagePaths[] = $path;
                }
                $imageData = json_encode(
                    $imagePaths
                );
                $createdShowwroom = [
                    'title' => $valid['name'],
                    'address' => $valid['address'],
                    'tagline' => $valid['tagline'],
                    'user_id' => Auth::id(),
                    'img' => $imageData,
                ];
                Showroom::create($createdShowwroom);

                $request->session()->flash('registration_completed', 'ВАша заявка принета и обработывается');
                return redirect()->route('home');
            }
        } else {
            $request->session()->flash('registration_completed', 'вы уже отправли заявоение');
            return redirect()->route('home');
        }
    }
}