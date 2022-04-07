<?php

namespace App\Http\Controllers;

use App\Models\IdeaStatus;
use App\Http\Requests\StoreIdeaStatusRequest;
use App\Http\Requests\UpdateIdeaStatusRequest;

class IdeaStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreIdeaStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdeaStatus  $ideaStatus
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaStatus $ideaStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdeaStatus  $ideaStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaStatus $ideaStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdeaStatusRequest  $request
     * @param  \App\Models\IdeaStatus  $ideaStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaStatusRequest $request, IdeaStatus $ideaStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdeaStatus  $ideaStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaStatus $ideaStatus)
    {
        //
    }
}
