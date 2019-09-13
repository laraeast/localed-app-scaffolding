<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Set the dashboard locale.
     *
     * @param $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($language)
    {
        Session::put('language', $language);

        return back();
    }
}
