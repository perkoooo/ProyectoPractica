@extends('adminlte::page')
@section('content_header')

<a href="empresa/create" class="btn btn-primary mb-3">CREAR</a>
<table id ="empresa"class="table table-striped table-bordered mt=4 shadow-lg" style="width:100%">
  <thead class="bg-primary text-wite">
   <tr>
    <th scope="col">RUT</th>
    <th scope="col">NOMBRE FANTASIA</th>
    <th scope="col">TELEFONO</th>
    
    <th scope="col">Acciones</th>
   </tr>
    </thead>
     <tbody>
      <tr>
        @foreach ($empresas as $empresas)
           <div class="row">
           <td>{{$empresas->EMP_RUT}}</td>
           <td>{{$empresas->EMP_NF}}</td>
           <td>{{$empresas->EMP_TL}}</td>
     
              <td>
                  <form action="{{route('empresa.destroy',$empresas->EMP_RUT)}} "method="POST">
                  <a href="empresa/{{$empresas->EMP_RUT}}/edit" class="btn btn-info">Editar</a>
                  @csrf
                  @method('DELETE')
                <button class = "btn btn-danger">Borrar</button>
          </td>
        </div>
      </form>
    </tr>
    @endforeach 
</table>

@section('js')
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.js"></script>
  <script>
      $(document).ready(function() {
        new DataTable('#empresa');

      }
      )
   </script>   
@stop


@stop