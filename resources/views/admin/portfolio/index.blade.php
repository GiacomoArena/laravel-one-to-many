@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Portfolio</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Type</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->id }}</td>
                        <td>{{ $portfolio->name }}</td>
                        <td>{{ $portfolio->surname }}</td>
                        <td><span class="badge bg-secondary">{{ $portfolio->type->type }}</span></td>
                        <td>
                            <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-dark"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-dark"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST"
                                onsubmit="return confirm('Confermi l\'eliminazione del carattere:  {{ $portfolio->name }} ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
