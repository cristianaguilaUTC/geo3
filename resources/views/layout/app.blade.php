<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG CA</title>
    
    <!--1. importacion de Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!--2. jquery validation : como solo es un link el de aqui hay que poner un script y ponerle dentro de un src-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <!--importando el datatables css para las tablas y script para la interaccion conl as tablas-->
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

    <!--importado flife imput-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js" integrity="sha512-0wQvB58Ha5coWmcgtg4f11CTSSxfrfLClUp9Vy0qhzYzCZDSnoB4Vhu5JXJFs7rU24LE6JsH+6hpP7vQ22lk5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/css/fileinput.min.css" integrity="sha512-yDVMONIXJPPAoULZ92Ygngsn8ZUGB4ejm6fCc6q9ZvdH8blFAOgg75XZSEaAJ5m4E/yPI1BAi5fF2axMHVuZ5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--boostrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <!-- Importando API de GOOGLE MAPS-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABE5OWEAIfoSVrz9VRsdXJgsciVbEwzxk&libraries=places&callback=initMap">
    </script>
    
    <!--importar icononos de cdn font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--importar icononos de cdn font sweetAlert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<!--container le hace un margen grande y con luid unmargen mas pequeño  -->
<body> 
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('menufoto.png') }}" alt="Logo" style="height: 30px; vertical-align: middle; margin-right: 5px;">
          </a>
         <!-- <a class="navbar-brand" href="http://127.0.0.1:8000/clientes"><b>SIG</b></a>  -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/clientes">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('clientes.create')}}">Nuevo Cliente</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('clientes/mapa')}}">Mapa de Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="http://127.0.0.1:8000/predios">Predios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('predios/create')}}">Registrar Predios</a>
              </li>
            </ul>
            
          </div>
        </div>
    </nav>
    <div class="container-fluid">

      @yield('content')
     </div>
   
    <!-- el row es para el rectangulo y exixte un col es para unos rectangulos internos -->
    <div class="row bg-dark" style="padding: 20px; color: white;">
        <div class="col-md-4 text-center">
            <img  height="100px" src="https://catalogo.utc.edu.ec/opac-tmpl/bootstrap/custom_utc_images/utc--logo--color.svg" alt="">
        </div>
        <div class="col-md-4 text-center">
            <h4><b>Desarrollado por:</b></h4>
            <h5>Santiago Aguila</h5>
        </div>
        <div class="col-md-4 text-center">
            <h6>Latacunga-2025</h6>
            <h6>Latacunga-2025</h6>
            <h6>Latacunga-2025</h6>
            <h6>Latacunga-2025</h6>
        </div>

    </div>
    <style>
        .error{
          color: red;
          font-weight: bold;
        }
        .form-control.error{
          border: 1px solid red;
        }
      </style>
        @if(session('success'))
        <script>
            Swal.fire({
                title: '¡Confirmado!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
        @endif

</body>
</html>