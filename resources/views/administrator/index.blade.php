@extends('administrator.layout')


@section('title', 'Gestiona a los Administradores')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/administrators.png') }}" 
						alt="Dos jovenes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Gestiona a otros <strong class="color-Text">administradores</strong>
					</h2>
					<p class="tab__description">El administrador es una persona capaz de gestionar a los profesores y estudiantes. Cuando hablamos de gestionar nos referimos a crear, actualizar y eliminar. Tu mismo eres un administrador, y si creas uno nuevo estarás permitiendo a otra persona hacer lo que tu puedes hacer.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un administrador
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">administradores</strong>
			</h2>
			<section class="list">
	        	@foreach ($administrators as $key => $item)
				<div class="list__card">
					<ul class="list__description">
						<li class="list__text list__text--id"><b>{{ $key + 1 }}</b></li>
						<li class="list__text">
							<b>Nombre: </b><p>{{ $item->name }}</p>
						</li>
						<li class="list__text">
							<b>Apellido: </b><p>{{ $item->lastname }}</p>
						</li>
						<li class="list__text">
							<b>Correo Electrónico: </b><p>{{ $item->email }}</p>
						</li>
					</ul>
					<ul class="list__actions">
						<a href="{{ route('administrator.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('administrator.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<form 
	                    	action="{{ route('administrator.destroy', $item) }}" 
	                    	method="POST" 
	                    	class="form__delete">
	                        
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="icon icon--delete"><i title="Eliminar" class="fa-solid fa-trash"></i> Eliminar</button>                
	                    </form> 
					</ul>
				</div>
	        	@endforeach
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/administrator/checkFormAdmin.js') }}"></script>
@endsection