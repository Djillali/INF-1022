<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\IdeaCategory;
use App\Models\IdeaVote;
use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ideas = Idea::with('user','idea_category', 'idea_status')
            ->addSelect([
                'voted_by_user' => IdeaVote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
            ])
            ->withCount('idea_votes')
            ->orderBy('id', 'desc')
            ->simplePaginate(10);

        $categories = IdeaCategory::all();

        return response(view('ideas.index', compact('ideas','categories')))
                    ->header('Cache-Control', 'no-cache, no-store, must-revalidate'); //Fixes back button bug after changing vote count
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
     * @param  \App\Http\Requests\StoreIdeaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
            'votesCount' => $idea->idea_votes()->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdeaRequest  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        //
    }
}
