<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.presentation.home');
    }

    public function search(SearchRequest $request)
    {
        return redirect()->action('FeedbackController@create', [$request->code]);
    }

    public function changeLang($langCode)
    {
        if ($langCode == 'sk' || $langCode == 'cz' || $langCode == 'en') {
            \Session::put('lang', $langCode);
        }

        return redirect()->back();
    }
}
