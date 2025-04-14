<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "UserController@index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "UserController@create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "UserController@store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "UserController@show $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "UserController@edit $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "UserController@update $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "UserController@destroy $id";
    }
}
