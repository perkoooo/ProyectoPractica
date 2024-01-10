@extends('adminlte::page')

@section('content_header')
<H2>Listado Comuna</H2>
@stop

@section('content')
<a href="comuna/create" class="btn btn-primary mb-3">CREAR</a>
<table id ="comuna"class="table table-striped table-bordered mt=4 shadow-lg" style="width:100%">
  <thead class="bg-primary text-wite">
   <tr>
    <th scope="col">Numero Comuna</th>
    <th scope="col">Numero Region</th>
    <th scope="col">Nombre Comuna</th>    
    <th scope="col">Acciones</th>
   </tr>
  </thead>
  <tbody>
         <tr>
              @foreach ($comunas as $comuna)
              <div class="row">
              <td>{{ $comuna->COM_ID}}</td>
              <td>{{ $comuna->Region_RG_ID}}</td>
              <td>{{ $comuna->COM_NOM}}</td>
             <td>
              <form action="{{route('comuna.destroy',$comuna->COM_ID)}} "method="POST">
               <a href="comuna/{{$comuna->COM_ID}}/edit" class="btn btn-info">Editar</a>
               @csrf
               @method('DELETE')
               <button class = "btn btn-danger">Borrar</button>

             </td>
           </div>
          </form>
        </tr>
      @endforeach
    </tbody>
</table>

@section('css')
   <link rel="stylesheet"   href=" https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.css"
 @stop


@section('js')
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.js"></script>
  <script>
      $(document).ready(function() {
        new DataTable('#comuna');

      }
      )
   </script>   
@stop

@stop