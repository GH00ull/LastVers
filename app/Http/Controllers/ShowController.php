<?php

namespace App\Http\Controllers;

use App\Models\Ads;
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
        return view('ads.creat');
    }
    public function Adsshow()
    {
        $ads = Ads::all();
        return view('ads.showall', compact('ads'));
    }
}