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
}
