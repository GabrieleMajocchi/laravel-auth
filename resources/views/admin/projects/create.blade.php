@extends('layouts.app')

@section('title', 'Create New Project')

@section('content')
<div class="container">
    <div class="row justify-content-around">
    @auth
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
        <div class="col-12">
            <h1>
                Create a new project
            </h1>
        </div>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">
                    Project Name:
                </label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">
                    Description:
                </label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="mb-3">
                <label for="lang" class="form-label">
                    Programming Language:
                </label>
                <input type="text" class="form-control" id="lang" name="lang">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">
                    Link:
                </label>
                <input type="text" class="form-control" id="link" name="link">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">
                    Date:
                </label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <button type="submit" class="btn btn-primary">
                Add new Project
            </button>
            <button type="reset" class="btn btn-warning">
                Reset fields
            </button>
            <br>
            <br>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-6 d-block col-1">Back to list</a>
        </form>
    @else
    <h1 class="text-center">You must be logged first!</h1>
    @endauth
    </div>
</div>

@endsection
