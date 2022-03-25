@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">Reporte de Pagos
                        <a class="btn btn-primary" href="/home/create">Crear pago</a>
                        <a class="btn btn-primary" href="/home/category/create">Crear categoria</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo de pago</th>
                                <th>Nombre o proveedor</th>
                                <th>Valor</th>
                            </tr>
                            @foreach ($paymentReports as $paymentReport)
                                <tr>
                                    <td>{{ $paymentReport->date_in }}</td>
                                    <td>{{ $paymentReport->cash_in }}</td>
                                    <td>{{ $paymentReport->name_payment }}</td>
                                    <td>{{ $paymentReport->valuePayment }}</td>
                                    <td><a href="/home/{{ $paymentReport->id }}/edit">Edit</a></td>
                                    <td><a href="/home/{{ $paymentReport->id }}/confirmDelete">Eliminar</a></td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
