@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="container">
        @auth
        <div class="row justify-content-around">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-8">
                <h1>
                    Edit {{$project->title}}
                </h1>
            </div>

            <form class="col-8" action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">
                        Project Name:
                    </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description:
                    </label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$project->description}}">
                </div>
                <div class="mb-3">
                    <label for="lang" class="form-label">
                        Programming Language:
                    </label>
                    <input type="text" class="form-control" id="lang" name="lang" value="{{$project->lang}}">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">
                        Link:
                    </label>
                    <input type="text" class="form-control" id="link" name="link" value="{{$project->link}}">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">
                        Date:
                    </label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$project->date}}">
                </div>

                <button type="submit" class="btn btn-primary">
                    Edit Project record
                </button>
                <button type="reset" class="btn btn-warning">
                    Reset fields
                </button>
                <br>
                <br>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-6 d-block col-2">Back to list</a>
            </form>
        </div>
        @else
        <h1 class="text-center">You must be logged first!</h1>
        @endauth
    </div>
@endsection
