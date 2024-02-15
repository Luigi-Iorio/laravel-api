@extends('layouts.admin')

@section('content')
    <div class="container edit py-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2>Modifica Tecnologia</h2>
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-success">Torna alla Home</a>
        </div>
        <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="title" class="form-label">Tecnologia</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $technology->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifica</button>
            </div>
        </form>
    </div>
@endsection
