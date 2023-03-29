<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LangController extends Controller
{
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        if(Auth::check()){
            $thisUser = Auth::user();
            $thisUser->update(['locale' => $request->lang]);
        }

        $back_route = app('router')->getRoutes()->match(app('request')->create(redirect()->back()->getTargetUrl()));
        $back_route_name = $back_route->getName();

        return redirect(route($back_route_name, ['locale' => App::getLocale()]));
    }
}
