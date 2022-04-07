<?php

namespace App\Http\Controllers;

use App\Models\IdeaCategory;
use App\Http\Requests\StoreIdeaCategoryRequest;
use App\Http\Requests\UpdateIdeaCategoryRequest;

class IdeaCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreIdeaCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIdeaCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IdeaCategory  $ideaCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaCategory $ideaCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdeaCategory  $ideaCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaCategory $ideaCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIdeaCategoryRequest  $request
     * @param  \App\Models\IdeaCategory  $ideaCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIdeaCategoryRequest $request, IdeaCategory $ideaCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdeaCategory  $ideaCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaCategory $ideaCategory)
    {
        //
    }
}
