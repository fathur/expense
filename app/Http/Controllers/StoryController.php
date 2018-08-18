<?php

namespace App\Http\Controllers;


use App\Model\Activity;
use App\Model\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        return view('story.index');
    }

    public function store(Request $request)
    {
        $user = \Auth::user();

//        dd($user);

        $predicate = $request->get('what-activity');
        $activity = Activity::nameLike($request->get('what-activity'))->first();

        if (!$activity) {
            $activity = Activity::create([
                'name'  => strtolower(trim($predicate))
            ]);
        }

        $user->stories()->create([
            'activity_id' => $activity->id,
            'object' => $request->get('what-object'),
            'location' => $request->get('where'),
            'money' => $request->get('how-much'),
            'datetime' => $request->get('when'),
            'cause' => $request->get('why')
        ]);
    }
}
