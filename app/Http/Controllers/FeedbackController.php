<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use Facades\App\Services\BoxService;
use Facades\App\Services\FeedbackService;
use Facades\App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($boxCode)
    {
        $box = BoxService::getByCode($boxCode);

        if ($box == null) {
            flash()->error(trans('flash.box.not-found'));

            return redirect()->action('HomeController@index');
        }

        return view('public.feedback.index', compact(['box']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store($boxCode, CreateFeedbackRequest $request)
    {
        $box = BoxService::getByCode($boxCode);

        if ($box == null) {
            flash()->error(trans('flash.box.not-found'));

            return redirect()->action('HomeController@index');
        }

        $user = UserService::getByEmail($request->email);

        if ($user == null) {
            $password = uniqid();

            $user = UserService::create([
                'email'    => $request->email,
                'password' => \Hash::make($password)
            ]);

            event(new Registered($user));
        }

        FeedbackService::create([
            'user_id' => $user->id,
            'box_id'  => $box->id,
            'comment' => $request->comment
        ]);

        flash()->success(trans('feedback.message.success'));

        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
