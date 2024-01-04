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
                   
                        </div>
                        <div class="form-group">
                            <label for="text">Ingresar tipo de documento</label>
                            <input type="text" class="form-control" id="DOC_TD" name="DOC_TD">
                       
                        </div>
                        <div class="form-group">
                            <label for="text">Ingresar numero nota credito (opcional)</label>
                            <input type="text" class="form-control" id="DOC_NNC" name="DOC_NNC">
                       
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de emisión</label>
                            <input type="text" class="form-control" id="DOC_FC" name="DOC_FC">
                       
                        </div>
                        <div class="form-group">
                            <label for="text">Tipo de movimiento</label>
                            <input type="text" class="form-control" id="DOC_TMV" name="DOC_TMV">
                         
                        </div>
                        <div class="form-group">
                            <label for="text">Rut empresa</label>
                            <input type="text" class="form-control" id="DOC_RUTE" name="DOC_RUTE">
                          
                        </div>
                        
                        

                            <div class="form-group">
                                <label for="texto2">Ingrese precio neto en pesos:</label>
                                <input type="text" class="form-control" id="DOC_NT" name="DOC_NT">
                            </div>
                            <div class="row">
                              
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