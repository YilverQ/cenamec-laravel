@extends('administrator.layout')


@section('title', 'Gestiona a los estudiantes')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/windows.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/students.png') }}" 
						alt="Dos estudiantes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Gestiona a otros <strong class="color-Text">estudiantes</strong>
					</h2>
					<p class="tab__description">El estudiante es la persona a quien va dirigido los curso y quien tiene la responsabilidad de aprender. Un estudiante puede cursar cualquier curso y al final obtener un certificado.</p>
					<ul class="header__bottons">
						<a href="{{ route('admin.student.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear estudiante
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">estudiantes</strong>
			</h2>

			<section class="list__content">
				<div class="list__table list__table--null">
					<ul class="list__description">
						<li class="list__text list__text--id list__text--title">N°</li>
						<li class="list__text list__text--title">Nombre</li>
						<li class="list__text list__text--title">Número de cédula</li>
						<li class="list__text list__text--title">Correo electrónico</li>
					</ul>
					<ul class="list__actions list__actions--null">
						<li class="list__text list__text--title">Acciones</li> 
					</ul>
				</div>
	        	@foreach ($students as $key => $item)
				<div class="list__table">
					<ul class="list__description">
						<li class="list__text list__text--id">{{ $key + 1 }}</li>
						<li class="list__text">{{ $item->name }}</li>
						<li class="list__text">{{ $item->identification_card }}</li>
						<li class="list__text">{{ $item->email }}</li>
					</ul>
					<ul class="list__actions">
						<a href="{{ route('admin.student.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('admin.student.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<form 
	                    	action="{{ route('admin.student.destroy', $item) }}" 
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