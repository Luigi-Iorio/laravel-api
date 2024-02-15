@extends('layouts.admin')

@section('content')
    <div class="container create py-5">
        <h2 class="mb-5">Inserisci un nuovo Progetto</h2>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="img_project" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="img_project" name="img_project">
                @error('img_project')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
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
                        <input type="checkbox" class="form-check-input" name="technologies[]"
                            id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                    </div>
                @endforeach
                @error('technologies')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="stack" class="form-label">Stack</label>
                <input type="text" class="form-control" name="stack" id="stack" value="{{ old('stack') }}">
                @error('stack')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="select">Seleziona Tipo</label>
                <select class="form-select mt-2" id="select" name="type_id">
                    <option value="" selected>Apri menu</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
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
                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </div>
        </form>
    </div>
@endsection
