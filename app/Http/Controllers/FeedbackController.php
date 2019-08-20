<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Events\FeedbackSent;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FeedbackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $this->authorize('create', Feedback::class);

        event(new FeedbackSent(Feedback::create($request->all())));

        $this->flash('sent');

        return back();
    }
}
