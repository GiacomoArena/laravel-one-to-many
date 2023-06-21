@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">Edit</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" class="form-control @error('title') is-invalid @enderror" name="title" type="text"
                placeholder="title" value="{{ old('title',$portfolio->title) }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select" name="type_id">
                <option selected>Select Type</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                placeholder="Name" value="{{ old('name',$portfolio->name) }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input id="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" type="text"
                placeholder="Surname" value="{{ old('surname',$portfolio->surname) }}">
            @error('surname')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
            name="description" id="description" cols="30" rows="10" class="form-control @error('gender') is-invalid @enderror">{{ old('description',$portfolio->description) }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Choose Img</label>
            <input id="image" class="form-control" name="image"
                type="file" placeholder=" Image" value="{{ old('image', $portfolio?->image) }}">
        </div>



        <button type="submit" class="btn btn-dark">Submit</button>

    </form>


    </div>
@endsection
