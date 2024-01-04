@extends('adminlte::page')
@section('content_header')
@section('content')
    <div class="container">
        <h2>Editar Documento</h2>
        <form action="{{ route('documento.update', $documento->DOC_ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="DOC_FOLIO">Folio:</label>
                <input type="text" name="DOC_FOLIO" value="{{ $documento->DOC_FOLIO }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="DOC_TD">Tipo de Documento:</label>
                <input type="text" name="DOC_TD" value="{{ $documento->DOC_TD }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="DOC_FC">Fecha:</label>
                <input type="date" name="DOC_FC" value="{{ $documento->DOC_FC }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="DOC_TMV">Tipo de Movimiento:</label>
                <input type="text" name="DOC_TMV" value="{{ $documento->DOC_TMV }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="Empresa_EMP_RUT">RUT de la Empresa:</label>
                <input type="text" name="Empresa_EMP_RUT" value="{{ $documento->Empresa_EMP_RUT }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="Empresa_EMP_RUT">Precio:</label>
                <input type="text" class="form-control" id="DOC_NT" name="DOC_NT" value="{{ $documento->DOC_NT }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
@endsection