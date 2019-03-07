@extends('layouts.app')

@section('content')
<div class="container">
    <div id="domain-pricing" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row-title grey-color">Dashboard</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="htfy-pricing-table-holder">
                        <div class="htfy-table">
                            <div class="row thead">
                                <div class="col-xs-2 th"></div>
                                <div class="col-xs-2 th"></div>
                                <div class="col-xs-2 th">Total</div>
                                <div class="col-xs-2 th">Yours</div>
                                <div class="col-xs-2 th">View</div>
                                <div class="col-xs-2 th"></div>
                            </div>
                            <div class="row trow">
                                <div class="col-xs-2 td"></div>
                                <div class="col-xs-2 td">Companies</div>
                                <div class="col-xs-2 td">{{ $totalcompanies }}</div>
                                <div class="col-xs-2 td">{{ $mycompanies }}</div>
                                <div class="col-xs-2 td"><a class="register-button" href="{{ route('companies.index',['id'=>'1']) }}">View</a></div>
                                <div class="col-xs-2 td"></div>
                            </div>
                            <div class="row trow">
                                <div class="col-xs-2 td"></div>
                                <div class="col-xs-2 td">Projects</div>
                                <div class="col-xs-2 td">{{ $totalprojects }}</div>
                                <div class="col-xs-2 td">{{ $myprojects }}</div>
                                <div class="col-xs-2 td"><a class="register-button" href="{{ route('projects.index',['id'=>'1']) }}">View</a></div>
                                <div class="col-xs-2 td"></div>
                            </div>
                            <div class="row trow">
                                <div class="col-xs-2 td"></div>
                                <div class="col-xs-2 td">Tasks</div>
                                <div class="col-xs-2 td">{{ $totaltasks }}</div>
                                <div class="col-xs-2 td">{{ $mytasks }}</div>
                                <div class="col-xs-2 td"><a class="register-button" href="{{ route('tasks.index',['id'=>'1']) }}">View</a></div>
                                <div class="col-xs-2 td"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
