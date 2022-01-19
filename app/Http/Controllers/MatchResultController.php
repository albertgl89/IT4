<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use App\Http\Requests\StoreMatchResultRequest;
use App\Http\Requests\UpdateMatchResultRequest;

class MatchResultController extends Controller
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
     * @param  \App\Http\Requests\StoreMatchResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function show(MatchResult $matchResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchResult $matchResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatchResultRequest  $request
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatchResultRequest $request, MatchResult $matchResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResult $matchResult)
    {
        //
    }
}
