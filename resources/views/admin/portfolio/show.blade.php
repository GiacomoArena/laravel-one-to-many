@extends('layouts.app')

@section('content')
    <div class="container my-ctn">
        <span class="d-inline">
            <h1>Portfolio {{ $portfolio->name }} {{ $portfolio->surname }}</h1>
            <h4>{{ $portfolio->type->type }}</h4>
            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-dark"><i
                    class="fa-solid fa-pencil"></i></a>
            <form class="d-inline" action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST"
                onsubmit="return confirm('Confermi l\'eliminazione del carattere:  {{ $portfolio->name }} ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="delete"><i class="fa-solid fa-trash"></i></button>
            </form>
        </span>
        <img src="{{ asset('storage/' . $portfolio?->image_path) }}" alt="image">
        <h2>{{ $portfolio->title }}</h2>
        <p>{!! $portfolio->description !!}</p>
    </div>
@endsection
