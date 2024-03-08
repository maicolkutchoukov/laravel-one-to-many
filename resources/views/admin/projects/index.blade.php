@extends('layouts.app')

@section('page-title', 'Tutti i project')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i project
                    </h1>
                    <div class="mb-3">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Creato il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->title }}</td>
                                    <td>
                                        @if ($project->type != null)
                                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                                {{ $project->type->title }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    {{-- Come formattare una data: https://www.php.net/manual/en/datetime.format.php --}}
                                    <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $project->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo project?');">
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
