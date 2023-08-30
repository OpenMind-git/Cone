<?php

namespace Erjon\Cone\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request, $locale)
    {
        if (! in_array($locale, ['en', 'it'])) {
            abort(400);
        }

        \Session::put('license-language', $locale);

        return back();
    }
}
