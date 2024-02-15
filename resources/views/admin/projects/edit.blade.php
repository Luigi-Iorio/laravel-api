@extends('layouts.admin')

@section('content')
    <div class="container edit py-5">
        <h2 class="mb-5">Modifica Il Progetto</h2>
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
            class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="img_project" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="img_project" name="img_project"
                    value="{{ old('img_project', $project->img_project) }}">
                @error('img_project')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="cont">
                    <label class="form-label">Tecnologie</label>
                </div>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input type="checkbox" class="form-check-input" name="technologies[]"
                                id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                        @else
                            <input type="checkbox" class="form-check-input" name="technologies[]"
                                id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                            <label for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                        @endif
                    </div>
                @endforeach
                @error('technologies')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="stack" class="form-label">Stack</label>
                <input type="text" class="form-control" name="stack" id="stack"
                    value="{{ old('stack', $project->stack) }}">
                @error('stack')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="slug" class="form-label">Slug - Modifica Automatica</label>
                <input type="text" id="slug" name="slug" class="form-control bg-secondary text-light"
                    value="{{ old('slug', $project->slug) }}" disabled>
                @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="select">Seleziona Tipo</label>
                <select class="form-select mt-2" id="select" name="type_id">
                    <option value="" selected>Apri menu</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                            {{ $type->type_title }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-warning">Modifica</button>
            </div>
        </form>
    </div>
@endsection
