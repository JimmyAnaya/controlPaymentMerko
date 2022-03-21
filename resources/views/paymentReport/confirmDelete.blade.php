@extends('layouts.app')

<div class="container">
    <div class="row justify-content-center">
        @section('content')
            <div class="row">
                <div class="col">
                    <h1>Eliminar pago</h1>
                </div>
            </div>

            <div class="col-md-16">
                <a class="btn btn-secondary" href="/home">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action='/home/{{ $paymentConfirmDelete->id }}' method="POST">
                    @csrf
                    @method('delete')
                    <tr>
                        <td>{{ $paymentConfirmDelete->date_in }}</td>
                        <td>{{ $paymentConfirmDelete->cash_in }}</td>
                        <td>{{ $paymentConfirmDelete->valuePayment }}</td>
                    </tr>

                    <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </div>
        </div>

    </div>
@endsection
