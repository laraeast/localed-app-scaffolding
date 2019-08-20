<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Feedback::class);

        return View::make('dashboard.feedback.index')
            ->withFeedback(
                Feedback::latest()->paginate()
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        $this->authorize('view', $feedback);

        $feedback->markAsRead();

        return View::make('dashboard.feedback.show')
            ->withFeedback($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $this->authorize('delete', $feedback);

        $feedback->delete();

        $this->flash('deleted');

        return redirect()->route('dashboard.feedback.index');
    }
}
