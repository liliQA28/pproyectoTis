
@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{ url('empresa/create') }}"class="btn btn-success">Registrar nuevo grupo Empresa</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Nombre Corto</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Socios</th>
            <th>Tipo de Sociedad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
        <tr>
            <td>{{ $empresa->id }}</td>
            <td>{{ $empresa->NombreCompleto }}</td>
            <td>{{ $empresa->NombreCorto }}</td>
            <td>{{ $empresa->Direccion }}</td>
            <td>{{ $empresa->Correo }}</td>
            <td>{{ $empresa->Socios }}</td>
            <td>{{ $empresa->TipoSociedad }}</td>
            <td>
                <a href="{{ url('/empresa/'.$empresa->id.'/edit') }}" class="btn btn-info">
                    Editar
                </a>
                 | 
                <form action="{{ url('/empresa/'.$empresa->id) }}"class="d-inline" method="post">
                @csrf
                {{method_field( 'DELETE' )}}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection