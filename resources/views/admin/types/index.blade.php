@extends('layouts.app')

@section('page-title', 'Tutti i tipi di progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i tipi di progetti
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Creata il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->title }}</td>
                                    {{-- Come formattare una data: https://www.php.net/manual/en/datetime.format.php --}}
                                    <td>{{ $type->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $type->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection