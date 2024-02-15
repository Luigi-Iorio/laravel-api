@extends('layouts.admin')

@section('content')
    <div class="container index py-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="text-light">Elenco tipi</h2>
            <a href="{{ route('admin.types.create') }}" class="btn btn-success">Aggiungi Tipo</a>
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
                @foreach ($types as $key => $type)
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $type->type_title }}</td>
                        <td>
                            <div class="d-flex gap-3">
                                <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-secondary">Modifica</a>
                                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
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
