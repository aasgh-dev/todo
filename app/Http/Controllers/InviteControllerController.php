<?php

namespace App\Http\Controllers;

use App\Models\InviteController;
use Illuminate\Http\Request;

use \App\Models\User;

class InviteControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('invite')->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InviteController $inviteController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InviteController $inviteController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InviteController $inviteController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InviteController $inviteController)
    {
        //
    }
}
