@extends('layouts.app')

@section("title", "Show a Project")

@section("content")
    <main>
        @guest
            <h1>You must be logged first!</h1>
        @else
        <div class="container">
            @if (session('stored'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session('stored') }} has been created
                    </div>
                </div>
            @elseif (session('updated'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('updated') }} has been updated succesfully
                </div>
            </div>
            @endif

            <p>
                Project Name: {{ $project->title }}
            </p>
            <p>
                Description: {{ $project->description }}
            </p>
            <p>
                Programming Language: {{ $project->lang }}
            </p>
            <p>
                Link: {{ $project->link }}
            </p>
            <p>
                Date: {{ $project->date }}
            </p>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-6 d-block col-1">Back to list</a>
        </div>
        @endguest
    </main>
@endsection
