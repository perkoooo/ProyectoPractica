@extends('adminlte::page')
@section('content_header')

<a href="{{ route('documento.create') }}" class="btn btn-primary mb-3">CREAR</a>
<table id="documento" class="table table-striped table-bordered mt-4 shadow-lg" style="width:100%">
    <thead class="bg-primary text-wite">
        <tr>
            <th scope="col">Numero de folio</th>
            <th scope="col">Tipo documento</th>
            <th scope="col">Fecha</th>
            <th scope="col">Tipo movimiento</th>
            <th scope="col">Rut</th>
            <th scope="col">Precio</th>
            <th scope="col">Numero Nota Credito</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->DOC_FOLIO }}</td>
                <td>{{ $documento->DOC_TD }}</td>
                <td>{{ $documento->DOC_FC }}</td>
                <td>{{ $documento->DOC_TMV }}</td>
                <td>{{ $documento->Empresa_EMP_RUT }}</td>
                <td>{{ $documento->DOC_NT }}</td>
                
                <td>{{ $documento->DOC_NNC }}</td>
                <td>{{ $documento->DOC_EST }}</td>
                <td>
                    <a href="{{ route('documento.edit', $documento->DOC_ID) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('documento.destroy', $documento->DOC_ID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
      
        @stack('scripts')
    </tbody>
</table>


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<script>
    $(document).ready(function() {
        $('#documento').DataTable();
    });
</script>

</script>
@stop

