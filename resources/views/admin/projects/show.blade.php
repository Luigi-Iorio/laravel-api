@extends('layouts.admin')

@section('content')
    <div class="container show p-5 mt-3 rounded-4">
        <div class="cont">
            <h3>Titolo:</h3>
            <h4> {{ $project->title }}</h4>
        </div>
        <div class="cont">
            <h5>Slug: </h5>
            <p>{{ $project->slug }}</p>
        </div>
        <div class="cont">
            <h5>Type: </h5>
            <p>{{ $project->type->type_title ?? 'Da inserire' }}</p>
        </div>
        <div class="cont">
            <h5>Tecnologie:</h5>
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>
                        <p>{{ $technology->title ?? 'Da inserire' }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cont">
            <h5>Stack:</h5>
            <p>{{ $project->stack }}</p>
        </div>
        <div class="cont">
            <h5>Descrizione:</h5>
            <p>{{ $project->description }}</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Modifica</a>
    </div>
@endsection
