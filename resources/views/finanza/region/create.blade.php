@extends('adminlte::page')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
     <H1><p class="text-primary">INGRESO REGIONES</p></H1>
      </div>
        <div class="card-body">
         <div class="row">
           <div class="col-7">
                    <form id ="form-data" action="/region" method="POST" class ="needs-validations">
                      @csrf
                    <div class="form-group">
                       <label for="val-1" class="form-label">Numero Region</label>
                       <input type="number" id="id" name="id" maxlength="3" minlength="1" placeholder="solo numeros" class="form-control my-2" required> 
                       
                    </div>
                    <div class="form-group">
                        <label for="val-2" class="form-label">Nombre Region</label>
                        
                        <input type="text"  mid="nom" name="nom" maxlength="20" minlength="1" placeholder="Nombre Region" class="form-control my-2" required>
                        
                    </div>  
                    
                <div>
           <a href="/region" class="btn btn-danger">Cancelar</a>
           <button type="submit" class="btn btn-success">Guardar</button>
          </div>   
         </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

