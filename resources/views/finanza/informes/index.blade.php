@extends('adminlte::page')
@section('content')

<form action="{{ route('obtener-datos') }}" method="post">
    @csrf

    <div class="container">
        <h2 class="mt-4">Resumen mensual </h2>
        
        <div class="row">
            <!-- Menú de Años -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="opcionesAño">Seleccione un año:</label>
                            <select class="form-control" id="opcionesAño" name="year">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menú de Meses -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="opcionesMes">Seleccione un mes:</label>
                            <select class="form-control" id="opcionesMes" name="month">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Compras</h3>
            </div>
            <table class="table table-bordered">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>Número de folio</th>
                    <th>Tipo de Documento</th>
                    <th>RUT Empresa</th>
                    <th>Razón social</th>
                    <th>Valor neto</th>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>
            </thead>
            <tbody>
                @foreach($Compras as $compra)
                    <tr>
                        <td>{{ $compra->DOC_FOLIO }}</td>
                        <td>{{ $compra->DOC_TD }}</td>
                        <td>{{ $compra->Empresa_EMP_RUT }}</td>
                        <td>{{ $compra->empresa_EMP_RS }}</td>
                        <td>{{ $compra->DOC_NT }}</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ventas</h3>
            </div>
            <table class="table table-bordered">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Tipo de Documento</th>
                    <th>RUT de la Empresa</th>
                    <th>Razón social</th>
                    <th>Neto</th>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>
            </thead>
            <tbody>
                @foreach($Ventas as $venta)
                    <tr>
                        <td>{{ $venta->DOC_FOLIO }}</td>
                        <td>{{ $venta->DOC_TD }}</td>
                        <td>{{ $venta->Empresa_EMP_RUT }}</td>
                        <td>{{ $venta->empresa_EMP_RS }}</td>
                        <td>{{ $venta->DOC_NT }}</td>
                        <!-- Agrega más celdas según sea necesario -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <!-- ... Otro contenido ... -->

        <button type="submit" class="btn btn-primary">Obtener Datos</button>
    </div>
</form>
@endsection