<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
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
                $companies = Auth::user()->companies;
                $ret = view('companies.index', ['companies'=>$companies]);
            }
            else
            {
                $companies= Company::all();
                $ret = view('companies.index', ['companies'=>$companies])->with('errors', ['You must be logged in to view your companies']);
            }
        }
        else
            {
                $companies= Company::all();
                $ret = view('companies.index', ['companies'=>$companies]);
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
        return view('companies.create');
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
            $companies = Company::all();
            foreach ($companies as $company)
            {
                if($company->name == $request->input('name'))
                {
                    return back()->withInput()->with('errors', ['Company already exists']);
                }
            }
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);

            if ($company)
            {
                return redirect()->route('companies.show', ['company'=>$company->id])->with('success', 'Company created successfully');
            }
            else
            {
                return back()->withInput()->with('errors', ['Company not created, please try again later']);
            }
        }

        return back()->withInput()->with('errors', ['You must be logged in to create a company']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        return view('companies.show', ['company'=>$company, 'comments'=>$company->comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        return view('companies.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $Company = Company::where('id', $company->id)->first();
        if (Auth::check())
        {
            if($Company->user_id != Auth::user()->id && Auth::user()->role_id != 1)
            {
                return back()->withInput()->with('errors', ['You are not authorized to edit company details']);
            }
            $companies = Company::all();
            foreach ($companies as $company)
            {
                if($company->name == $request->input('name') && $company->id != $Company->id)
                {
                    return back()->withInput()->with('errors', ['Company already exists']);
                }
            }

            $CompanyUpdate = $Company
                ->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description')
                ]);
            if ($CompanyUpdate)
            {
                return redirect()->route('companies.show', ['company' => $Company->id])->with('success', 'Company details updated successfully');
            }

            else
            {
                return back()->withInput()->with('errors', ['Company details not updated, please try again later']);
            }
        }

        return back()->withInput()->with('errors', ['You must be logged in to edit details of the company' . Auth::check()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $Company = Company::where('id',$company->id)->first();
        if (Auth::check())
        {
            if($Company->user_id != Auth::user()->id && Auth::user()->role_id != 1)
            {
                return back()->withInput()->with('errors', ['You are not authorized to delete this company']);
            }

            if ($Company->delete())
            {
                return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
            }

            return back()->withInput()->with('errors', ['company could not be deleted']);

        }
        return back()->withInput()->with('errors', ['You must be logged in to delete the company']);
    }
}
