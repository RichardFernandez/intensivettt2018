<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Stilos -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/intesivetttstyles.css') }}">

</head>
<body>
	{{-- navegacion del backend --}}
	<header id="header" class="">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">INTENSIVETTT</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Clientes</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Entrenadores</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Usuarios</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Catálogos 
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{ url('/categorias')}}">Categorías de video</a>
		          <a class="dropdown-item" href="{{ url('/disciplinas') }}">Disciplinas</a>
		          <a class="dropdown-item" href="{{ url('/estados') }}">Estados</a>
		          <a class="dropdown-item" href="{{ url('/marcas') }}">Marcas de suplementos</a>
		          <a class="dropdown-item" href="{{ url('/medidas') }}">Unidades de medida</a>
		          <a class="dropdown-item" href="{{ url('/permisos') }}">Permisos</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        
		      </li>
		    </ul>
		  </div>
		</nav>
	</header><!-- /header -->

	<div class="row text-center encabezado">
		<div class="col">
			@yield('titulos')
		</div>
	</div>


    <div class="container">
    	@yield('content')
    </div>

    @yield('js')
</body>
</html>