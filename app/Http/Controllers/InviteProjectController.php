<?php

namespace App\Http\Controllers;

use App\Models\Invites_project;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Support\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class InviteProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $users=User::all();

        return view('project.invite', ['project' => $project, 'users' => $users]);
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
    public function store(Request $request ,Project  $project)
    {
        $invite = Invites_project::create(
            [
                'user_id' => $request['user_id'],
                'project_id' => $project->id,
            ]
        );

        // $invite->save();

        session()->flash('success', 'member added successfully');

        return redirect(route('projects.invites_project.index',  $project));
    }

    /**
     * Display the specified resource.
     */
    public function show(Invites_project $invites_project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invites_project $invites_project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invites_project $invites_project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invites_project $invites_project)
    {
        //
    }
}
