@extends('layouts.admin')

@section('content')
    <div class="container index py-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="text-light">Elenco Tecnologie</h2>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">Aggiungi Tecnologia</a>
        </div>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody class="table-dark">
                @foreach ($technologies as $key => $technology)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $technology->title }}</td>
                        <td>
                            <div class="d-flex gap-3">
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                    class="btn btn-secondary">Modifica</a>
                                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
