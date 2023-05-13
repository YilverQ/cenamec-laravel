@extends('teacher.layout')


@section('title', 'Crea un nuevo curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection

@section('content')
	@error('imgFile')
		<p class="message message--warning">
			Error, la imagen no es valida 
        	<i class="close-message fa-solid fa-xmark"></i></i>
        </p>
	@endError
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article" id="profile">
			<!--Information-->
			<div class="form">
				<h2 class="tab__title--centered">
					Editar <strong class="color-Text">curso</strong>
				</h2>
				<form class="form__content" 
						method="POST" 
						action="{{ route('teacher.course.update', $course) }}"
						enctype="multipart/form-data">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-book-open-reader"></i>
					</h2>
					<h2 class="form__title">Datos del curso</h2>
					<div class="form__item">
						<label for="name">Nombre:</label>
						<input class="form__input form__input--input" 
								name="name" 
								required 
								type="text" 
								id="name" 
								placeholder="Física para principiante"
								minlength="3"
								maxlength="50"
								autocomplete="off"
								value="{{ $course->name }}">
					</div>
					<div class="form__item">
						<label for="description">Descripción:</label>
						<textarea class="form__textarea form__input--input"
									name="description"
									id="description"
									placeholder="Curso de introducción a la física es un curso que promueve la educación en los niños, niñas, adolecentes y adultos. Con este curso podrás aprender sobre diversas áreas de la física." 
									maxlength="255"
									required="true"
									rows="7"
									value="">{{ $course->description }}</textarea>
					</div>
					<div class="form__item">
						<span>Actualizar imágen del curso:</span>
						<label for="img" class="labelFile">
							<div class="labelFile__input">
								<span class="labelFile__imgText" id="imgFile"></span>
							</div>
							<span class="labelFile__text">Agregar</span>
						</label>
						<input class="form__file" 
								name="img"
								type="file" 
								id="img" 
								autocomplete="off" 
								accept="image/*">
					</div>
					<input class="form__send" 
						type="submit" 
						value="Editar">
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
	<script type="module" src="{{ asset('js/course/checkFormCourseUpdate.js') }}"></script>
@endsection