@extends('adminlte::page')
@section('content')

<div class="container">
  <div class ="row">
    <div class="col">
      <div class="card">
        <div class="card-header text-center font-weight-bold">
          <h1>Registro Empresa</h1>    
        </div>
        <div class="card-body">
             <form id ="form-data" class="needs-validation"   action ="/empresa/{{$empresas->EMP_RUT}}"   method="POST">
                @csrf
                @method('PUT')
                 <div class="row">
                        <div class="form-group">
                            <label for ="validad-1"class = "form-label">RUT Empresa</label>
                            <input type="text" id="rut" value= '{{$empresas->EMP_RUT}}' name="rut" disabled oninput = "checkRut(this)" maxlength="13" minlength="7" placeholder="Ingrese  Rut Empresa" class="form-control my-2" value ="{{$empresas->emp_rut}}" required>          
                        </div>
                        <div class="form-group col-6">
                            <label for="validad-2"class = "form-label">Razon Social</label>
                            <input type="text" id="rs" name ="rs" value= '{{$empresas->EMP_RS}}' placeholder="Ingrese Razon Social" class="form-control my-2" required>
                        </div>
                 </div>
                 <div class="row">
                        <div class="form-group col-6">
                            <label for="valida-3"class ="form-label">Giro</label>
                            <input type="text" id="gr" name="gr" value= '{{$empresas->EMP_GS}}' placeholder="Ingrese Giro" class="form-control my-2" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="validad-4"class = "form-label">Nombre Fantasia</label>
                            <input type="text" id="nf" name="nf" value= '{{$empresas->EMP_NF}}' placeholder="Ingrese Nombre De Fantasia" class="form-control my-2"required>
                        </div>
                 </div>
                 <div class="row">
                        <div class="form-group col-6">
                            <label for="validad-5"class ="fomr-label">Dirrecion</label>
                            <input type="text" id="dr" name="dr" value= '{{$empresas->EMP_DR}}' placeholder="Ingrese Direccion" class="form-control my-2" required>
                        </div>
                        <div class="for-group col-6">
                            <label for="validad-8"class ="form-label">Telefono</label>
                            <input type="text" id="tl" name="tl" value= '{{$empresas->EMP_TL}}' placeholder="Ingrese Telefono" class="form-control my-2" required>
                        </div>    
                 </div>
                 <div class="row">
                        <div class="for-group col-6">
                            <select name ="cm" id="cm" aria-lavel="Seleccione Comuna">
                            <option selected>Seleccione Comuna</option>
                            @foreach ($comuna as  $comuna)
                            <option value={{$comuna->com_id}}>{{$comuna->COM_NOM}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-6">
                            <select name ="rg" id="rg" aria-lavel="Seleccione Region">
                            <option selected>Seleccione Comuna</option>
                            @foreach ($region as $regiones)
                             <option value={{$regiones->RG_ID}}>{{$regiones->RG_NOM}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>           
                        <div class="for-group col-6">
                            <label for="validad-9"class ="form-label">Email</label>
                            <input form="text" id="eml" name="eml" value= '{{$empresas->EMP_EML}}' placeholder="Ingrese Email" class="form-control my-2" required>
                        </div>   
                        <div>
                  <div  class = "row">     
                    <div class = "form-group col-4">     
                      <a href = "/emppresa" class="btn btn-danger">Cancelar</a>
                     <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                  </div>
            </div> 
            </form>
           </div>    
        </div> 
      </div> 
   </div>   
</div> 

@section('js')
<script>
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.','');
        // Despejar Guión
        valor = valor.replace('-','');
        
        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        
        // Formatear RUN
        rut.value = cuerpo + '-'+ dv
        
        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
        
        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;
        
        // Para cada dígito del Cuerpo
        for(i=1;i<=cuerpo.length;i++) {
        
            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);
            
            // Sumar al Contador General
            suma = suma + index;
            
            // Consolidar Múltiplo dentro del rango [2,7]
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
      
        }
        
        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);
        
        // Casos Especiales (0 y K)
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;
        
        // Validar que el Cuerpo coincide con su Dígito Verificador
        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
        
        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    
    }
    </script>
    @stop
@stop