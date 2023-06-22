<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Brand;
use App\Models\City;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function Home()
    {
        return view('homes');
    }
    public function registration()
    {
        return view('auth.reg');
    }
    public function login()
    {
        return view('auth.auth');
    }
    public function Adscreat()
    {
        $city = City::all();
        $brand = Brand::all();
        return view('ads.creat', compact('city', 'brand'));
    }
public function Adsshow()
    {
        $ads = Ads::all();
        $city=City::all();
        $brand=Brand::all();
        return view('ads.showall', compact('ads','city','brand'));
    }
}