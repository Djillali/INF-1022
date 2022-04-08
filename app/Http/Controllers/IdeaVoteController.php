<?php

namespace App\Http\Controllers;

use App\Models\IdeaVote;
use App\Http\Requests\StoreIdeaVoteRequest;
use App\Http\Requests\UpdateIdeaVoteRequest;

class IdeaVoteController extends Controller
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
     * @param  \App\Http\Requests\StoreIdeaVoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaVoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdeaVote  $ideaVote
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaVote $ideaVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdeaVote  $ideaVote
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaVote $ideaVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdeaVoteRequest  $request
     * @param  \App\Models\IdeaVote  $ideaVote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaVoteRequest $request, IdeaVote $ideaVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdeaVote  $ideaVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaVote $ideaVote)
    {
        //
    }
}
