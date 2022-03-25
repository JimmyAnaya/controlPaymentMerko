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

        <form action='/home' method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="date">Fecha:</label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker'>
                            <input type='text' class="form-control" id="date" name="date" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="typePayment">Tipo de pago:</label>
                    <select name="typePayment" id="typePayment" class="form-select">
                        @foreach ($categories as $category)
                            <option>{{ $category->name_category }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="input-group mb-3">
                    <label for="namePayment">Nombre o proveedor</label>
                    <input type="text" class="form-control" id="namePayment" name="namePayment"
                        placeholder="Nombre del pago" value="{{ old('namePayment') }}">
                </div>
                <div class="input-group mb-3">
                    <label for="valuePayment">Valor del pago</label>
                    <input type="number" class="form-control" id="valuePayment" name="valuePayment"
                        placeholder="Valor del pago" value="{{ old('valuePayment') }}">
                </div>

            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
