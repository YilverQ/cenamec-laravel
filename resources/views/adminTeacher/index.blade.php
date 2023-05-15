@extends('administrator.layout')


@section('title', 'Gestiona a los profesores')
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
						src="{{ asset('img/administrator/teachers.png') }}" 
						alt="Profesora enseñando a los alumnos">

				<div class="tab__information">
					<h2 class="tab__title">
						Gestiona a otros <strong class="color-Text">profesores</strong>
					</h2>
					<p class="tab__description">El profesor es una persona importante. Dicha persona está encargada de crear nuevos cursos y exponer los conocimientos que sean necesarios y que son relevantes para los estudiantes. Un profesor puede crear un curso, actualizarlo cuando guste y eliminarlo en caso de no ser necesario.</p>
					<ul class="header__bottons">
						<a href="{{ route('admin.teacher.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un profesor
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">profesores</strong>
			</h2>
			<section class="list">
	        	@foreach ($teachers as $key => $item)
				<div class="list__card">
					<ul class="list__description">
						<li class="list__text list__text--id"><b>{{ $key + 1 }}</b></li>
						<li class="list__text">
							<b>Nombre: </b><p>{{ $item->name }}</p>
						</li>
						<li class="list__text">
							<b>Número de cédula: </b><p>{{ $item->identification_card }}</p>
						</li>
						<li class="list__text">
							<b>Correo Electrónico: </b><p>{{ $item->email }}</p>
						</li>
					</ul>
					<ul class="list__actions">
						<a href="{{ route('admin.teacher.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('admin.teacher.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<form 
	                    	action="{{ route('admin.teacher.destroy', $item) }}" 
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