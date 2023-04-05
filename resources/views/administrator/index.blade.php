@extends('administrator.layout')


@section('title', 'Gestiona a los Administradores')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
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
								Crear Administrador
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
			<form class="form__search" 
						method="POST" 
						action="">
					@csrf @method('PUT')
					<div class="search_container">
						<label for="name">Nombre:</label>
						<input class="form__input" 
								name="name" 
								type="text" 
								id="name" 
								placeholder="Yilver"
								minlength="3"
								maxlength="20"
								autocomplete="off">
					</div>
					<div class="search_container">
						<label for="lastname">Apellido:</label>
						<input class="form__input" 
								name="lastname" 
								type="text" 
								id="lastname" 
								placeholder="Quevedo"
								minlength="3"
								maxlength="20"
								autocomplete="off">
					</div>
					<div class="search_container">
						<label for="email">Correo Eléctronico:</label>
						<input class="form__input" 
								name="email" 
								type="email" 
								id="email" 
								placeholder="yilver@gmail.com"
								autocomplete="off">
					</div>
					<input class="button-search" 
							type="submit" 
							value="Buscar">
				</form>
			<!--Information-->
			<section class="content-table">
			 	<table class="table">
					<tr>
						<th>N°</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo Electrónico</th>
						<th>Acciones</th>
					</tr>
		        	@foreach ($administrators as $key => $item)
		        	@if ( ($key + 1) % 2 == 0)
			        	<tr class="tr">
							<td class="td">{{ $key + 1 }}</td>
							<td class="td">{{ $item->name }}</td>
							<td class="td">{{ $item->lastname }}</td>
							<td class="td">{{ $item->email }}</td>
							<td class="td td--action">
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
							</td>
						</tr>
		        	@else
		        		<tr class="tr tr--colored">
							<td class="td">{{ $key + 1 }}</td>
							<td class="td">{{ $item->name }}</td>
							<td class="td">{{ $item->lastname }}</td>
							<td class="td">{{ $item->email }}</td>
							<td class="td td--action">
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
							</td>
						</tr>
		        	@endif
					
		        	@endforeach
				</table> 			            
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/formEye.js') }}"></script>
	<script type="module" src="{{ asset('js/administrator/checkFormAdmin.js') }}"></script>
@endsection