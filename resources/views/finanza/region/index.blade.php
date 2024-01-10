@extends('adminlte::page')
@section('content_header')

<H2>Listado Region</H2>
@stop

@section('content')
<a href="region/create" class="btn btn-primary mb-3">CREAR</a>
<table id ="region"class="table table-striped table-bordered mt=4 shadow-lg" style="width:100%">
  <thead class="bg-primary text-wite">
   <tr>
    <th scope="col">Numero Region</th>
    <th scope="col">Nombre Region</th>
    <th scope="col">Acciones</th>
   </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($regiones as $region)
      <div class="row">
      <td>{{ $region->RG_ID }}</td>
      <td>{{ $region->RG_NOM }}</td>
      <td>
        <form action="{{route('region.destroy',$region->RG_ID)}} "method="POST">
        <a href="/region/{{$region->RG_ID}}/edit" class="btn btn-info">Editar</a>
        @csrf
        @method('DELETE')
        <button type="submit" class = "btn btn-danger">Borrar</button>
        
        </form>
      </td>
      </div>
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
        new DataTable('#region');

      }
      )
   </script>   
@stop

@stop