@extends('layouts.admin')

@section('content')
    <div class="container edit py-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2>Modifica Tipo</h2>
            <a href="{{ route('admin.types.index') }}" class="btn btn-success">Torna alla Home</a>
        </div>
        <form action="{{ route('admin.types.update', $type->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="type_title" class="form-label">Type</label>
                <input type="text" class="form-control" name="type_title" id="type_title"
                    value="{{ old('type_title', $type->type_title) }}">
                @error('type_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modifica</button>
            </div>
        </form>
    </div>
@endsection
