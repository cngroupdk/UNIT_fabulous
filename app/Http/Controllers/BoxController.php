<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReactionToFeedbackRequest;
use Facades\App\Services\FeedbackService;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showFeedback($id)
    {
        $feedbacks = FeedbackService::getFeedbacksForBox($id);
        return view('public.feedback.show', compact(['feedbacks']));
    }

    public function storeReactionToFeedback($id, ReactionToFeedbackRequest $request)
    {
        $ids = $request->feedback_ids;
        $comments = $request->feedback_comments;
        $favorites = $request->feedback_favorites;

        for ($i = 0; $i < count($request->feedback_ids); ++$i) {
            $reaction = [
                'comment'  => $comments[$i],
                'favorite' => $favorites[$i]
            ];

            FeedbackService::update($ids[$i], $reaction);
        }

        return redirect()->action('BoxController@showFeedback', [$id]);
    }
}
