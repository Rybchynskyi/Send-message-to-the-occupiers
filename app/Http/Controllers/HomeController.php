<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale = 'en')
    {
        // set default locale
        App::setLocale($locale);
        session()->put('locale', $locale);
        URL::defaults(['locale' => app()->getLocale()]);

        $purchasesCount = Purchase::all()->count();
        $usersCount = User::all()->count();
        $sum = Purchase::all()->sum('sum');

        return view('home', compact('purchasesCount', 'usersCount', 'sum'));
    }
}
