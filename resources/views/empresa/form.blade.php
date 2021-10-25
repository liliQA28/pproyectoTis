<h1>{{$modo }} Grupo Empresa </h1>

@if(count ($errors) >0)
    <div class="alert alert-danger" role="alert">
    <ul>   
        @foreach( $errors->all () as $error)
        <li>{{ $error }} </li>
        @endforeach
    </ul> 
    </div>
@endif

<div class="form-group">

<label for="Nombre">Nombre Completo</label>
    <input type="text" class="form-control"name="NombreCompleto" value="{{ isset($empresa->NombreCompleto)?$empresa->NombreCompleto:old('NombreCompleto') }}" id="NombreCompleto">
  </div>  

    <div class="form-group">
    <label for="NombreCorto">Nombre Corto</label>
    <input type="text" class="form-control" name="NombreCorto" value="{{ isset($empresa->NombreCorto)? $empresa->NombreCorto:old('NombreCorto') }}" id="NombreCorto">
    </div> 

    <div class="form-group">
    <label for="TipoSociedad">Tipo de Sociedad</label>
    <input type="text" class="form-control" name="TipoSociedad" value="{{ isset($empresa->TipoSociedad)? $empresa->TipoSociedad:old('TipoSociedad') }}" id="TipoSociedad">
   
    </div> 

    <div class="form-group">
    <label for="Direccion">Direccion</label>
    <input type="text" class="form-control" name="Direccion" value="{{ isset($empresa->Direccion)?$empresa->Direccion:old('Direccion') }}"id="Direccion">
   
    </div> 


    <div class="form-group">
    <label for="Correo"> Correo </label>
    <input type="text" class="form-control" name="Correo" value="{{ isset( $empresa->Correo)?$empresa->Correo:old('Correo') }}"id="Correo">
   
    </div> 


    <div class="form-group">
    <label for="Socios">Socios </label>
    <input type="text" class="form-control" name="Socios" value="{{isset( $empresa->Socios)?$empresa->Socios:old('Socios') }}"id="Socios">
  
    </div> 


    <input type="submit" value="{{$modo }} datos" class="btn btn-success">

    <a class="btn btn-primary"  href="{{ url('empresa/') }}">Regresar</a>

    