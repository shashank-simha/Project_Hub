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
                $tasks = Auth::user()->tasks;
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
            if (Auth::user()->role_id == 1)
            {
                $projects = Project::all();
            }

            else
            {
                $projects = Auth::user()->projects;
            }
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
            if (!$member && Auth::user()->role_id != 1)
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
        $task = Task::where('id', $task->id)->first();
        return view('tasks.show', ['task'=>$task,  'comments'=>  $task->comments]);
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

    public function adduser(Request $request)
    {
        if (Auth::check())
        {
            $task = Task::find($request->input('task_id'));
            if ($task)
            {

                if (Auth::user()->id == $task->user_id || Auth::user()->role_id == 1)
                {
                    $user = User::where('email', $request->input('email'))->first(); //single record
                    if ($user)
                    {
                        //check if user is already added to the project
                        $taskUser = TaskUser::where('user_id', $user->id)
                            ->where('task_id', $task->id)
                            ->first();

                        if ($taskUser)
                        {
                            //if user already exists, exit
                            return back()->withInput()->with('success', $request->input('email') . ' is already a member of this task');
                        }

                        $task->users()->attach($user->id);
                        return back()->withInput()->with('success', $request->input('email') . ' was added to the task successfully');

                    }
                    return back()->withInput()->with('errors', ['No user with this email exists']);
                }
                return redirect()->route('tasks.show', ['task' => $task->id])->with('errors', 'You are not authenticated to add members to this task');
            }
            return redirect()->route('tasks.index')->with('errors', ['Task not found']);
        }
        return back()->withInput()->with('errors', ['You must be logged in to add members to a task']);
    }

    public function removeuser(Request $request)
    {
        if (Auth::check())
        {
            $task = Task::find($request->input('task_id'));
            if ($task)
            {

                if (Auth::user()->id == $task->user_id || Auth::user()->role_id == 1)
                {
                    $user = User::find($request->input('user_id')); //single record
                    if ($user)
                    {
                        //check if user is already added to the project
                        $taskUser = TaskUser::where('user_id', $user->id)
                            ->where('task_id', $task->id)
                            ->first();

                        if ($taskUser)
                        {
                            //if user exists, remove
                            $task->users()->detach($user->id);
                            return back()->with('success', $user->email . ' was removed from the task successfully');
                        }

                        return back()->with('errors', [$user->email . ' is not a member of the task']);

                    }
                    return back()->withInput()->with('errors', ['No user with this email exists']);
                }
                return redirect()->route('tasks.show', ['task' => $task->id])->with('errors', ['You are not authenticated to remove members from this task']);
            }
            return redirect()->route('tasks.index')->with('errors', ['Task not found']);
        }
        return back()->withInput()->with('errors', ['You must be logged in to remove members to a task']);
    }

}
