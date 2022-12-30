@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($job->title) }}</div>
                    <div class="card-body">
                        <p>
                        <h3>Job Description : </h3>{{ $job->description }}</p>
                        <p>
                        <h3>Roles & Responsibilities : </h3>{{ $job->roles }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Short Info') }}</div>
                    <div class="card-body">
                        <p><strong>Company : </strong><a href="{{ route('companies.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }}</a></p>
                        <p><strong>Address : </strong>{{ $job->address }}</p>
                        <p><strong>Employment Type : </strong>{{ $job->type }}</p>
                        <p><strong>Position : </strong>{{ $job->position }}</p>
                        <p><strong>Post Date : </strong>{{ $job->created_at->diffForHumans() }}</p>
                        <p><strong>Last Date : </strong>{{ date('F d Y', strtotime($job->last_date)) }}</p>
                    </div>
                </div>
                @if (Auth::check() && Auth::user()->user_type == 'seeker')
                    <br> <button class="btn btn-success" style="width:100%;">Apply</button>
                @endif
            </div>
        </div>
    </div>
@endsection
