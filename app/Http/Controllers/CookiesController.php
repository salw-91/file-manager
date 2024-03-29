<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookiesController extends Controller
{
    public function read(Request $request)
    {
        $theme = $request->cookie('theme');

        return view('cookies', compact('theme'));
    }

    public function create(Request $request)
    {
        $theme = $request->input('theme');

        if ($theme && in_array($theme, ['light', 'dark'])) {
            // set a cookie
            $cookie = cookie('theme', $theme, 60 * 24 * 365);
        }

        return back()->withCookie($cookie);
    }
}
