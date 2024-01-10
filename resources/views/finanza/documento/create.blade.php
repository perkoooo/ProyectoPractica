@extends('adminlte::page')
@section('content')

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Documento</h2>
                    <form method="POST" action="{{ route('documento.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="text">Ingresar número de folio:</label>
                            <input type="text" class="form-control" id="DOC_FOLIO" name="DOC_FOLIO">
                            @error('DOC_FOLIO')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DOC_TMV">Tipo de documento</label>
                            <select class="form-control" id="DOC_TD" name="DOC_TD">
                                <option value="Factura">Factura</option>
                                <option value="Factura exenta">Factura exenta</option>
                                <option value="Boleta">Boleta</option>
                                <option value="Nota crédito">Nota crédito</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">Ingresar numero nota credito (opcional)</label>
                            <input type="text" class="form-control" id="DOC_NNC" name="DOC_NNC">
                       
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de emisión</label>
                            <input type="date" class="form-control" id="DOC_FC" name="DOC_FC">
                            @error('DOC_FC')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DOC_TMV">Tipo de Movimiento</label>
                            <select class="form-control" id="DOC_TMV" name="DOC_TMV">
                                <option value="Compra">Compra</option>
                                <option value="Venta">Venta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Empresa_EMP_RUT">Seleccionar Empresa</label>
                            <select class="form-control" id="Empresa_EMP_RUT" name="Empresa_EMP_RUT">
                                @foreach($empresas as $empresa)
                                    <option value="{{ $empresa->EMP_RUT }}">{{ $empresa->EMP_RS }} ({{ $empresa->EMP_RUT }})</option>
                                @endforeach
                            </select>
                        </div>
                        

                            <div class="form-group">
                                <label for="texto2">Ingrese precio neto en pesos:</label>
                                <input type="text" class="form-control" id="DOC_NT" name="DOC_NT">
                                @error('DOC_NT')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="DOC_EST">Estado</label>
                            <select class="form-control" id="DOC_EST" name="DOC_EST">
                                <option value="Activa">Activa</option>
                                <option value="Inactiva">Inactiva</option>
                               
                            </select>
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Guardar Documento</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection