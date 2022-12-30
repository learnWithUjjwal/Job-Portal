@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Recent Jobs</h1>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td><img src="{{ asset('avatar/main.jpg') }}" width="80" height="50"></td>
                                <td>Position : {{ $job->position }}
                                    <br><i class="fa fa-clock"></i> {{ $job->type }}
                                </td>
                                <td><i class="fa fa-map-marker"></i> Address : {{ $job->address }}</td>
                                <td><i class="fa fa-globe"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                                        <button class="btn btn-success btn-sm">Apply</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<style>
    .fa {
        color: #418307;
    }
</style>
