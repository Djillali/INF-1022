<?php

namespace App\Http\Controllers;

use App\Models\IdeaComment;
use App\Http\Requests\StoreIdeaCommentRequest;
use App\Http\Requests\UpdateIdeaCommentRequest;

class IdeaCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreIdeaCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdeaComment  $ideaComment
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaComment $ideaComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdeaComment  $ideaComment
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaComment $ideaComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdeaCommentRequest  $request
     * @param  \App\Models\IdeaComment  $ideaComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaCommentRequest $request, IdeaComment $ideaComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdeaComment  $ideaComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaComment $ideaComment)
    {
        //
    }
}
