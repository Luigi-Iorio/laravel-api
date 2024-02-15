@extends('layouts.admin')

@section('content')
    <div class="container create py-5">
        <h2 class="mb-5">Crea una nuova Tecnologia</h2>
        <form action="{{ route('admin.technologies.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="title" class="form-label">Tecnologia</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </div>
        </form>
    </div>
@endsection
