@extends('layouts.app')


<div class="container">
    <div class="row justify-content-center">
        @section('content')
            <div class="row">
                <div class="col">
                    <h1 class="row justify-content-center">Editar pago</h1>
                </div>
            </div>
            <div class="col-md-16">
                <a class="btn btn-secondary" href="/home">Back</a>
            </div>
        </div>

        <form action="/home/{{ $paymentEdit->id }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="mb-3">
                    <label for="date">Fecha:</label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker'>
                            <input type='text' class="form-control" id="date" name="date"
                                value="{{ $paymentEdit->date_in }}" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="typePayment">Tipo de pago:</label>
                    <select name="typePayment" id="typePayment" class="form-select"
                        value="{{ $paymentEdit->cash_in }}">
                        <option>Abono</option>
                        <option>Efectivo</option>
                        <option>Factura de contrado</option>
                        <option>Factura de credito</option>
                        <option>Fin de caja</option>
                        <option>Gastos</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label for="valuePayment">Valor del pago</label>
                    <input type="number" class="form-control" id="valuePayment" name="valuePayment"
                        placeholder="Valor del pago" value="{{ $paymentEdit->valuePayment }}">
                </div>

            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
