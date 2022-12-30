@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="company-profile">
                    <img src="{{ asset('cover_photo/main.jpg') }}" style="width:100%"><br>
                    <div class="company-desc">
                        <img src="{{ asset('avatar/main.jpg') }}" alt="" style="width:10%">{{ $company->description }}
                        <h1>{{ $company->cname }}</h1>
                        <p>
                            <strong>Slogan-</strong> {{ $company->slogan }}
                            <strong>Address-</strong> {{ $company->address }}
                            <strong>Phone-</strong> {{ $company->phone }}
                            <strong>Website-</strong> {{ $company->website }}
                        </p>
                    </div>
                </div>
                {{-- Company Posted Jobs --}}
                <h2>Posted Jobs</h2>
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
