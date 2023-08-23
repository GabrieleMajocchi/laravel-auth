@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
                <h1>
                    Welcome to the Admin control pannel homepage
                </h1>
                <a href="{{ route('projects.index') }}" class="btn btn-primary">See Project List</a>
            @else
            <h1 class="text-center">You must be logged first!</h1>
            @endauth
        </div>
    </div>
</div>
@endsection
