<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/chosen/chosen.jquery.js') }}"></script>
	<!-- Stilos -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/chosen/chosen.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('css/intesivetttstyles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
		          <a class="dropdown-item" href="{{ url('/frases') }}">Frases motivadoras</a>
		          <a class="dropdown-item" href="{{ url('/bebidas') }}">Bebidas</a>

		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="{{ url('/suplementos') }}">Suplementos</a>
		          <a class="dropdown-item" href="{{ url('/videos') }}">Videos</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="{{ url('/insumos') }}">Insumos de recetas</a>
		          <a class="dropdown-item" href="{{ url('/snacks') }}">Snacks</a>
		          <a class="dropdown-item" href="{{ url('/recetas') }}">Recetas</a>

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