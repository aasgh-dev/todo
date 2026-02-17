<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIvitedRequest;
use App\Models\Project;
use \App\Models\User;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $users = User::all()->except([Auth::id()]);

        return view('invite', ['project' => $project, 'users' => $users]);
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
    public function store(Request $request,Project $project)
    {
        // $validated = $request->validate([
        //     'user_id'=>'required',
        //     'project_id'=>'required',
        // ]);

        $invite = Invite::create(
            [
                'user_id' => $request['user_id'],
                'project_id' => $project->id,
            ]
        );

        $invite->save();

        session()->flash('success','member added successfully');

        return redirect(route('projects.invites.index',$project));
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
        
    }
}
