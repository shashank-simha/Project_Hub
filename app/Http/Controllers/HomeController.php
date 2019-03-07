<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\TaskUser;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalcompanies = Company::all()->count();
        $totalprojects = Project::all()->count();
        $totaltasks = Task::all()->count();
        $companies = Auth::user()->companies;
        $projects = Auth::user()->projects;
        $tasks = Auth::user()->tasks;
        $mycompanies = $companies->count();
        $myprojects = $projects->count();
        $mytasks = $tasks->count();
        return view('home', ['totalcompanies' => $totalcompanies, 'mycompanies' => $mycompanies, 'totalprojects' => $totalprojects, 'myprojects' => $myprojects, 'totaltasks' => $totaltasks, 'mytasks' => $mytasks]);
    }
}
