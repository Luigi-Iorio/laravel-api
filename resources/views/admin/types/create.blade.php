@extends('layouts.admin')

@section('content')
    <div class="container create py-5">
        <h2 class="mb-5">Crea un nuovo Tipo</h2>
        <form action="{{ route('admin.types.store') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="type_title" class="form-label">Type</label>
                <input type="text" class="form-control" name="type_title" id="type_title" value="{{ old('type_title') }}">
                @error('type_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserisci</button>
            </div>
        </form>
    </div>
@endsection
