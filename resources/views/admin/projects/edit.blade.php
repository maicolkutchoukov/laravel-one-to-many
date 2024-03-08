@extends('layouts.app')

@section('page-title', $project->title.' Edit')

@section('main-content')
<h1>
    {{ $project->title }} Edit
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                Torna all'index delle paste
            </a>
        </div>

        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" placeholder="Inserisci il titolo..." maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il contenuto..." required>{{ old('content', $project->content) }}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Aggiungi
                </button>
            </div>

            <div>
                <button type="submit" class="btn btn-warning w-100">
                    Aggiorna
                </button>
            </div>

        </form>
    </div>
</div>
@endsection