@extends('layout.app')
@section('content')
<br>
<h1 style="text-align: center;">Mapa de Clientes</h1>
<br>
<hr>
<div class="form-control" id="mapa-clientes" style="border: 2px solid black; height:500px;
            width:100%"></div>
<br><br>

<script type="text/javascript">

      function initMap(){
        //alert("mapa ok");
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
          document.getElementById('mapa-clientes'),
          {
            center:latitud_longitud,
            zoom:7,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        @foreach($clientes as $clienteTemporal)
         var coordenadaCliente= new google.maps.LatLng({{$clienteTemporal->latitud}},{{$clienteTemporal->longitud}});
            var marcador=new google.maps.Marker({
            position:coordenadaCliente,
            map:mapa,
            icon:'{{ asset("hombre.png") }}',
            title:"{{$clienteTemporal->apellido}} {{$clienteTemporal->nombre}}",
            draggable:false
            });
         @endforeach
      }

</script>

@endsection