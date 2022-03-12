<?php

namespace App\Http\Controllers;

use App\Models\Federation;
use App\Http\Requests\StoreFederationRequest;
use App\Http\Requests\UpdateFederationRequest;

class FederationController extends Controller
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
     * @param  \App\Http\Requests\StoreFederationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFederationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function show(Federation $federation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function edit(Federation $federation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFederationRequest  $request
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFederationRequest $request, Federation $federation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federation  $federation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Federation $federation)
    {
        //
    }
}
