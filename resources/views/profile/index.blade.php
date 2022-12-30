@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @if (!empty(auth()->user()->profile->avatar))
                    <img src="{{ Storage::url(auth()->user()->profile->avatar) }}" style="width:100%">
                @else
                    <img src="{{ asset('avatar/main.jpg') }}" alt="" style="width:100%">
                @endif
                <br>
                <div class="form-group">
                    <form action="{{ route('user.profile.avatar') }}" method="POST" enctype="multipart/form-data"
                        class="form-group">@csrf
                        <input type="file" name="avatar" class="form-control"><br>
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Update Your Profile
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.create') }}" method="POST">@csrf
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ auth()->user()->profile->address }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Expreience</label>
                                <textarea name="experience" class="form-control">{{ auth()->user()->profile->experience }}"</textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Bio</label>
                                <textarea name="bio" class="form-control">{{ auth()->user()->profile->bio }}"</textarea>
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update </button>
                            </div>
                            @if (Session::has('status'))
                                <br>
                                <div class="alert alert-success">{{ Session::get('status') }}</div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Address:</strong> {{ auth()->user()->profile->address }}</p>
                        <p><strong>Bio:</strong> {{ auth()->user()->profile->bio }}</p>
                        <p><strong>Experience: </strong>{{ auth()->user()->profile->experience }}</p>
                        <p><strong>Member on: </strong>{{ auth()->user()->created_at->diffForHumans() }}</p>
                        @if (!empty(Auth::user()->profile->cover_letter))
                            <p><strong>Cover Letter:</strong> <a target="_blank"
                                    href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                        @else
                            <p>Please update Cover Letter</p>
                        @endif

                        @if (!empty(Auth::user()->profile->resume))
                            <p><strong>Resume:</strong> <a download target="_blank"
                                    href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                        @else
                            <p>Please update Resume</p>
                        @endif
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Update Cover Letter</div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.coverLetter') }}" method="POST"
                            enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <input type="file" name="cover_letter" class="form-control">
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>
                </div><br>
                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.resume') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="resume" class="form-control">
                            </div><br>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
