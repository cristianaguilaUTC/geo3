@extends('layout.app')
@section('content')

<br>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6 bg-light" style="border: 1px solid black;  border-radius: 15px;">
        <br>
        <h1 style="text-align: center;"><b>Nuevo Cliente</b></h1>
        
<form action="{{ route('clientes.store') }}"
        method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    @csrf
    <h1 style="text-align: center;">Registrar Nuevo Cliente</h1>
    <hr>
    <label for="" style="font-weight: bold;"><b>Cedula:</b></label><br>
    <input class="form-control" type="text" name="cedula" id="cedula" placeholder="Ingrese la cedula del cliente"> <br> <br>
    <label for="" style="font-weight: bold;"><b>Apellido:</b></label><br>
    <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese el apellido del cliente"> <br> <br>
    <label for="" style="font-weight: bold;"><b>Nombre:</b></label><br>
    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del cliente"> <br> <br>
    <label for="" style="font-weight: bold;"><b>Latitud:</b></label><br>
    <input class="form-control" readonly type="text" name="latitud" id="latitud" placeholder="latitud"> <br> <br>
    <label for="" style="font-weight: bold;"><b>Longitud:</b></label><br>
    <input class="form-control" readonly type="text" name="longitud" id="longitud" placeholder="longitud"> <br> <br>

    <br>
      <div class="form-control" id="mapa_cliente" style="border:1px solid black; height:250px;
            width:100%"> </div>
    <br>
    <button type="submit" class="btn btn-success">Guardar</button> &nbsp;&nbsp;&nbsp;&nbsp; 
    <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
</form>
 <br>
    </div>
    <div class="col-md-3">   
    </div>
</div><br><br><br>


<script type="text/javascript">

      function initMap(){
        //alert("mapa ok");
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
          document.getElementById('mapa_cliente'),
          {
            center:latitud_longitud,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcador=new google.maps.Marker({
          position:latitud_longitud,
          map:mapa,
          title:"Seleccione la direccion",
          draggable:true
        });
        google.maps.event.addListener(
          marcador,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            /*alert("LATITUD: "+latitud);
            alert("LONGITUD: "+longitud);*/
            document.getElementById("latitud").value=latitud;
            document.getElementById("longitud").value=longitud;
          }
        );
      }

</script>


<script>
    $("#frm_nuevo_cliente").validate({
        rules:{
            "cedula":{
                required:true,
                minlength:10,
                maxlength:10,
                digits:true
            },
            "apellido":{
                required:true,
                minlength:3,
                maxlength:30
            },
            "nombre":{
                required:true,
                minlength:3,
                maxlength:30
            },
            "latitud":{
                required:true,
                number:true
            },
            "longitud":{
                required:true,
                number:true
            }
        },
        messages:{
            "cedula":{
                required:"Debe ingresar la cédula del cliente.",
                minlength:"La cédula debe tener 10 dígitos.",
                maxlength:"La cédula debe tener 10 dígitos.",
                digits:"Solo se permiten números en la cédula."
            },
            "apellido":{
                required:"Debe ingresar el apellido del cliente.",
                minlength:"El apellido debe tener al menos 3 caracteres.",
                maxlength:"El apellido no debe exceder los 30 caracteres."
            },
            "nombre":{
                required:"Debe ingresar el nombre del cliente.",
                minlength:"El nombre debe tener al menos 3 caracteres.",
                maxlength:"El nombre no debe exceder los 30 caracteres."
            },
            "latitud":{
                required:"Debe seleccionar una ubicación en el mapa.",
                number:"Valor de latitud inválido."
            },
            "longitud":{
                required:"Debe seleccionar una ubicación en el mapa.",
                number:"Valor de longitud inválido."
            }
        }
    });
</script>


@endsection
