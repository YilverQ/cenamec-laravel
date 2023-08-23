@extends('teacher.layout')


@section('title', 'Editar módulo educativo')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection

@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article" id="profile">
			<!--Information-->
			<div class="form">
				<h2 class="tab__title--centered">
					Editar <strong class="color-Text">módulo educativo</strong>
				</h2>
				<form class="form__content form__content--big" 
						method="POST" 
						action="{{ route('teacher.module.update', $module) }}"
						enctype="multipart/form-data">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-book-open-reader"></i>
					</h2>
					<h2 class="form__title">Datos del módulo</h2>
					<div class="grid-two">
						
						<div class="form__item">
							<label for="super_name">Nombre:</label>
							<input class="form__input form__input" 
									name="super_name" 
									required 
									type="text" 
									value="{{ $module->name }}" 
									id="super_name" 
									placeholder="Física para principiante"
									minlength="3"
									maxlength="120"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="course">Curso:</label>
							<select class="form__input form__input--del" 
										name="course" 
										id="course">
								<option value="{{ $course->id }}" selected>
									{{ $course->name }}
								</option>
							</select>
						</div>
						
					</div>
					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="description">Descripción:</label>
							<textarea class="form__textarea form__input form__input--big"
										name="description"
										id="description"
										placeholder="Consolidar el desarrollo formativo del “Diplomado en Ciencia y Calidad Educativa en el Sub - Sistema de Educación Básica”..." 
										maxlength="800"
										required="true"
										rows="7">{{ $module->description }}</textarea>
						</div>
					</div>	
						
					<input class="form__send" 
						type="submit" 
						value="Actualizar">
				</form>
			</div>
		</article>
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/administrator/teachers.png') }}" 
					alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">
						Ver lista de <strong class="color-Text">módulos</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('teacher.course.index') }}">
							<li class="header__loginItem">
								Ver cursos
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
@endsection