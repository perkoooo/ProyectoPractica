@extends('adminlte::page')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header text-center font-weight-bold">
     <H1><p class="text-primary">EDICION  COMUNAS</p></H1>
      </div>
        <div class="card-body">
         <div class="row">
           <div class="col-7">
                    <form id ="form-data" action="/comuna/{{$comunas->COM_ID}}" method="POST" class ="needs-validations">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <select class="form-select" name="rg" id="validationDefault04" aria-label="Seleccione Region" required>
                          
                         <option selected  value=''>Seleccione Region</option>
                        @foreach ($relacion as $relacion)
                          <option value = {{$relacion->RG_ID}} > {{$relacion->RG_NOM}} </option>
             
                        @endforeach
                         </select>
                         
                     </div>    
                     <div class="form-group">
                        <label for="val-1" class="form-label">Nombre Comuna</label>
                        <input type="text" id="id" name="nom" maxlength="30" minlength="1" placeholder="Ingrese Comuna" class="form-control my-2"  value = "{{$comunas->COM_NOM}}" required> 
                        
                     </div>
                    
                <div>
           <a href="/comuna" class="btn btn-danger">Cancelar</a>
           <button type="submit" class="btn btn-success">Guardar</button>
          </div>   
         </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop