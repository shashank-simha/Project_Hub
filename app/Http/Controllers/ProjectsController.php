<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->id)
        {
            if (Auth::check())
            {
                $projects = Project::where('user_id', Auth::user()->id)->get();
                $ret = view('projects.index', ['projects'=>$projects]);
            }
            else
            {
                $projects = Project::all();
                $ret = view('projects.index', ['projects'=>$projects])->with('errors', ['You must be logged in to view your projects']);
            }
        }
        else
        {
            $projects = Project::all();
            $ret = view('projects.index', ['projects'=>$projects]);
        }
        return $ret;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
        {
            if (Auth::user()->role_id == 1)
            {
                $companies = Company::all();
            }

            else
            {
                $companies = Auth::user()->companies;
            }
        }
        else
        {
            $companies = [];
        }
        return view('projects.create', ['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check())
        {
            $company = Company::find($request->input('company'));
            if($company->user_id != Auth::user()->id && Auth::user()->role_id != 1)
            {
                return back()->withInput()->with('errors', ['You are not authorized to create a project in this company']);
            }
            foreach ($company->projects as $project)
            {
                if($project->name == $request->input('name'))
                {
                    return back()->withInput()->with('errors', ['A project with same name exists in this company']);
                }
            }

            //verify duration
            if ($request->input('days')>365 || $request->input('days')<1)
            {
                return back()->withInput()->with('errors', ['Duration should be between 1 and 365']);
            }

            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'days' => $request->input('days'),
                'company_id' => $request->input('company'),
                'user_id' => Auth::user()->id
            ]);

            if ($project)
            {
                return redirect()->route('projects.show', ['project'=>$project->id])->with('success', 'Project created successfully');
            }
            else
            {
                return back()->withInput()->with('errors', ['Project not created, please try again later']);
            }
        }

        return back()->withInput()->with('errors', ['You must be logged in to create a project']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::where('id', $project->id)->first();
        return view('projects.show', ['project'=>$project,  'comments'=>  $project->comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if (Auth::check())
        {
            $companies = Auth::user()->companies;
        }
        else
        {
            $companies = [];
        }
        return view('projects.edit', ['project'=>$project, 'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if (Auth::check())
        {
            $Project = Project::where('id', $project->id)->first();
            if($Project->user_id != Auth::user()->id && Auth::user()->role_id != 1)
            {
                return back()->withInput()->with('errors', ['You are not authorized to edit project details']);
            }

            $company = Company::find($request->input('company'));
            foreach ($company->projects as $project)
            {
                if($project->name == $request->input('name') && $project->id != $Project->id)
                {
                    return back()->withInput()->with('errors', ['A project with same name exists in this company'.$project->id.$Project->id ]);
                }
            }

            $ProjectUpdate = $Project->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'days' => $request->input('days'),
                'company_id' => $request->input('company'),
                'user_id' => Auth::user()->id
            ]);
            if ($ProjectUpdate)
            {
                return redirect()->route('projects.show', ['project' => $Project->id])->with('success', 'Project details updated successfully');
            }

            else
            {
                return back()->withInput()->with('errors', ['Project details not updated, please try again later']);
            }
        }

        return back()->withInput()->with('errors', ['You must be logged in to edit project details']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $Project = Project::where('id',$project->id)->first();
        if (Auth::check())
        {
            if (Auth::user()->id == $Project->user_id && Auth::user()->role_id != 1)
            {
                if ($Project->delete())
                {
                    return redirect()->route('projects.index')->with('success', 'Company deleted successfully');
                }

                return back()->withInput()->with('errors', ['project could not be deleted']);
            }
        }
        return back()->withInput()->with('errors', ['You are not authenticated to delete the project']);
    }

    public function adduser(Request $request)
    {
        if (Auth::check())
        {
            $project = Project::find($request->input('project_id'));
            if ($project)
            {

                if (Auth::user()->id == $project->user_id || Auth::user()->role_id == 1)
                {
                    $user = User::where('email', $request->input('email'))->first(); //single record
                    if ($user)
                    {
                    //check if user is already added to the project
                    $projectUser = ProjectUser::where('user_id', $user->id)
                        ->where('project_id', $project->id)
                        ->first();

                    if ($projectUser)
                    {
                        //if user already exists, exit
                        return back()->withInput()->with('success', $request->input('email') . ' is already a member of this project');
                    }

                    $project->users()->attach($user->id);
                    return back()->withInput()->with('success', $request->input('email') . ' was added to the project successfully');

                }
                    return back()->withInput()->with('errors', ['No user with this email exists']);
                }
                return redirect()->route('projects.show', ['project' => $project->id])->with('errors', 'You are not authenticated to add members to this project');
            }
            return redirect()->route('projects.index')->with('errors', ['Project not found']);
        }
        return back()->withInput()->with('errors', ['You must be logged in to add members to a project']);
    }
}
