<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\TaskUser;
use Illuminate\Http\Request;

class TasksController extends Controller
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
                $tasks = Task::where('user_id', Auth::user()->id)->get();
                $ret = view('tasks.index', ['tasks'=>$tasks]);
            }
            else
            {
                $tasks = Task::all();
                $ret = view('tasks.index', ['tasks'=>$tasks])->with('errors', ['You must be logged in to view your projects']);
            }
        }
        else
        {
            $tasks = Task::all();
            $ret = view('tasks.index', ['tasks'=>$tasks]);
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
            $projects = Auth::user()->projects;
        }
        else
        {
            $projects = [];
        }
        return view('tasks.create', ['projects'=>$projects]);
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
            $project = Project::find($request->input('project'));
            $member = false;
            foreach($project->users as $user)
            {
                if($user->id == Auth::user()->id)
                {
                    $member = true;
                }
            }
            if (!$member)
            {
                return back()->withInput()->with('errors', ['Only members are authorized to add tasks in this project']);
            }
            foreach ($project->tasks as $task)
            {
                if($task->name == $request->input('name'))
                {
                    return back()->withInput()->with('errors', ['A task with same name exists in this project']);
                }
            }

            //verify duration
            if ($request->input('days')>365 || $request->input('days')<1)
            {
                return back()->withInput()->with('errors', ['Duration should be between 1 and 365']);
            }
            if ($request->input('hours')>23 || $request->input('hours')<1)
            {
                return back()->withInput()->with('errors', ['Duration should be between 1 and 23']);
            }

            $task = Task::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'days' => $request->input('days'),
                'hours' => $request->input('hours'),
                'company_id' => $project->company_id,
                'user_id' => Auth::user()->id,
                'project_id' => $request->input('project'),
            ]);

            if ($task)
            {
                return redirect()->route('tasks.show', ['tasks'=>$task->id])->with('success', 'Task added successfully');
            }
            else
            {
                return back()->withInput()->with('errors', ['Task not added, please try again later']);
            }
        }

        return back()->withInput()->with('errors', ['You must be logged in to add a task']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
