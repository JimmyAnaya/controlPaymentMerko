@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <a class="btn btn-secondary" href="/home">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col py-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <form action='/home/category' method="POST">
            @csrf
            <div class="form-group">

                <div class="input-group mb-3">
                    <label for="nameCategory">Categoria</label>
                    <input type="text" class="form-control" id="nameCategory" name="nameCategory"
                        placeholder="Nombre de la categoria" value="{{ old('nameCategory') }}">
                </div>

            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
