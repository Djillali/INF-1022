<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use App\Http\Requests\StoreGifRequest;
use App\Http\Requests\UpdateGifRequest;

class GifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gifs.index');
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
     * @param  \App\Http\Requests\StoreGifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function show(Gif $gif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function edit(Gif $gif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGifRequest  $request
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGifRequest $request, Gif $gif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gif $gif)
    {
        //
    }
}
