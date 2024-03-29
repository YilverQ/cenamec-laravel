@extends('teacher.layout')


@section('title', 'Crea un nuevo curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
@endsection

@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article" id="profile">
			<!--Information-->
			<div class="form">
				<h2 class="tab__title--centered">
					Crear un nuevo <strong class="color-Text">curso</strong>
				</h2>
				<form class="form__content form__content--big" 
						method="POST" 
						action="{{ route('teacher.course.store') }}"
						enctype="multipart/form-data">

					@csrf @method('POST')
					<h2 class="form__icon">
						<i class="fa-solid fa-book-open-reader"></i>
					</h2>
					<h2 class="form__title">Datos del curso</h2>
					<div class="grid-two">
						
						<div class="form__item">
							<label for="super_name">Nombre:</label>
							<input class="form__input form__input" 
									name="super_name" 
									required 
									type="text" 
									id="super_name" 
									placeholder="Física para principiante"
									autocomplete="off">
						</div>
						<div class="form__item">
							<span>Imagen del curso:</span>
							<label for="img" class="labelFile">
								<div class="labelFile__input">
									<span class="labelFile__imgText" id="imgFile"></span>
								</div>
								<span class="labelFile__text">Agregar</span>
							</label>
							<p>El peso máximo de la imagen es de 2Mb</p>
							<input class="form__file form__input" 
									name="img"
									required  
									type="file" 
									id="img" 
									autocomplete="off" 
									accept="image/*">
						</div>
					</div>
					<div class="grid-two">
						<div class="form__item">
							<label for="purpose">Propósito:</label>
							<textarea class="form__textarea form__input"
										name="purpose"
										id="purpose"
										placeholder="Consolidar el desarrollo formativo del “Diplomado en Ciencia y Calidad Educativa en el Sub - Sistema de Educación Básica”..." 
										required="true"
										rows="7"></textarea>
						</div>
						<div class="form__item">
							<label for="general_objetive">Objetivo General:</label>
							<textarea class="form__textarea form__input"
										name="general_objetive"
										id="general_objetive"
										placeholder="Generar un proceso de acompañamiento, para el desarrollo formativo del Diplomado en Ciencia y Calidad Educativa en el Sub - Sistema de Educación Básica en los ocho corredores del conocimiento. " 
										required="true"
										rows="7"></textarea>
						</div>
					</div>

					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="specific_objetive">Objetivos específicos:</label>
							<textarea class="form__textarea form__input form__input--big"
										name="specific_objetive"
										id="specific_objetive"
										placeholder="• Caracterizar a los participantes, facilitadores y tutores regionales, que formaran parte del Diplomado en Ciencia y Calidad Educativa en el Subsistema de Educación Básica.
• Diagnosticar el proceso organizativo para la administración del plan de formación. 
• Orientar sobre los procesos formativos, requeridos, para el desarrollo del plan de formación. 
• Orientar a los facilitadores y tutores sobre la concepción de los programas y procesos de organización para su activación" 
										required="true"
										rows="7"></textarea>
						</div>
					</div>
					<div class="grid-one">
						<div class="form__item form__item--big">
							<label for="competence">Competencias a lograr:</label>
							<textarea class="form__textarea form__input form__input--big"
										name="competence"
										id="competence"
										placeholder="• Caracterizar a los participantes, facilitadores y tutores regionales, que formaran parte del Diplomado en Ciencia y Calidad Educativa en el Subsistema de Educación Básica.
• Diagnosticar el proceso organizativo para la administración del plan de formación. 
• Orientar sobre los procesos formativos, requeridos, para el desarrollo del plan de formación. 
• Orientar a los facilitadores y tutores sobre la concepción de los programas y procesos de organización para su activación" 
										required="true"
										rows="7"></textarea>
						</div>
					</div>
					<div class="grid-two">
						<div class="form__item">
							<label for="teachers">Profesores asignados:</label>
							<select class="form__input form__input--select" 
										name="teachers[]"
										multiple 
										id="teachers">
								@foreach($teachers as $key => $item)
								<option value="{{ $item->id }}">
									{{ $item->user->firts_name }}
									-- 
									{{ $item->user->identification_card }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="buttonCourse">
							<input type="hidden" id="disabled" name="disabled" value="false">
							<div class="button-box button-box--course">
								<div class="btn" id="btn--course"></div>
								<input class="toggle-btn toggle-btn--checked toggle-btn--course"
									type="button" 
									id="leftClick" 
									name="role"
									value="Deshabilitado">
								<input class="toggle-btn toggle-btn--course"
									type="button" 
									id="rightClick"
									name="role"
									value="Habilitado">
							</div>
						</div>
					</div>
					
					<input class="form__send" 
						type="submit" 
						value="Crear">
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
						Ver lista de <strong class="color-Text">cursos</strong>
					</h2>
					<ul class="header__bottons">
						<a href="{{ route('teacher.course.index') }}">
							<li class="header__loginItem">
								Ver mis cursos
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/inputFile.js') }}"></script>
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


	<script>
    	let selectTeacher = new MultiSelectTag('teachers', {
		    rounded: true,    // default true
		    shadow: true,      // default false
		    placeholder: 'Buscar profesor',  // default Search...
		    onChange: function(values) {
		        console.log(values)
		    }
		}) 
	</script>
	<script type="module" src="{{ asset('js/course/switchField.js') }}"></script>
	<script type="module" src="{{ asset('js/course/roleButtonSelect.js') }}"></script>
@endsection