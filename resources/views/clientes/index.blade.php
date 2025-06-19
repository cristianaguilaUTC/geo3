@extends('layout.app')
@section('content')

<h1 style="text-align: center;">Listado de clientes</h1>
<hr>
<br>
<div class="text-end">
    &nbsp; &nbsp; <a href="{{route('clientes.create')}}" class="btn btn-dark">Agregar Nuevo</a> &nbsp; &nbsp;&nbsp; &nbsp;
    <a href="{{url('clientes/mapa')}}" class="btn btn-warning">Ver Mapa Global</a>
</div>
<br>
<br>
<table class="table table-bordered table-striped table-hover" id="tbl_cargos"> 
    <thead class="bg-dark" style="color: white;">
        <tr>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>CEDULA</th>
            <th>LATITUD</th>
            <th>LONGITUD</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clienteTemporal)
    <tr>
        <td>{{$clienteTemporal->apellido}}</td>
        <td>{{$clienteTemporal->nombre}}</td>
        <td>{{$clienteTemporal->cedula}}</td>
        <td>{{$clienteTemporal->latitud}}</td>
        <td>{{$clienteTemporal->longitud}}</td>
        <td>
            <a href="{{ route('clientes.edit', $clienteTemporal->id) }}" class="btn btn-outline-warning">
                <i class="fa fa-pen"></i>
            </a>

            <button class="btn btn-outline-danger" onclick="confirmarEliminacion({{ $clienteTemporal->id }})">
                <i class="fa fa-trash"></i>
            </button>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará el cliente.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Crear y enviar formulario DELETE
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/clientes/' + id;

                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';

                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

@endsection