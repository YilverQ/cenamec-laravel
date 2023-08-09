@extends('student.layout')


@section('title', 'Datos del estudiante')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/imgOptions.css') }}">
@endsection


@section('content')
	<!--Contenedor-->
	<main class="container">
		<div class="containerImgOptions containerImgOptions--hidden">
		<div class="imgOptions">
			<p class="imgOptions__closeButton"><i class="fa-solid fa-xmark"></i> Quitar</p>
			<form class="imgOptions__form"
					method="POST" 
					action="{{ route('student.img') }}">
					@csrf @method('PUT')

				<div class="grid-one grid-one--justify">
				<div class="form_checkbox">
					<h3 class="form__subtitle">Selecciona una foto de perfil</h3>
					
					@foreach($profileimgs as $key => $item)
					<div class="boxCheckbox">
						<input class="input__checkbox" 
								name="picture" 
								type="radio"
								value="{{ $item->id }}" 
								id="{{ $item->name }}" 
								autocomplete="off">
						<label for="{{ $item->name }}" class="labelTitle">
							<img class="imgOptions__img" 
								src="{{ $item->url }}" 
								alt="Imagen de perfil">
							<h4 class="labelTitle_text">{{ $item->name }}</h4>
						</label>
					</div>
					@endforeach

				</div>
				</div>
				<div class="buttonFixed">
					<input class="form__send" type="submit" value="¡Actualizar Foto!">
				</div>
			</form>
		</div>
	</div>

		<!--Information-->
		<article class="article">
			<section class="profile">
				<div class="superContainerFixed">
				<div class="container_img">
					<div class="profile__container-img">
						<img class="profile__img" 
							src="{{ asset($student->profileimg->url) }}" 
							alt="Niño aprendiendo">
					</div>
					<ul class="header__bottons">
						<li class="header__loginItem header__loginItem--contrast" id="profileimg">
							Editar foto de perfil
						</li>
					</ul>
				</div>
				</div>

				<div class="container_profile">
				<form class="form__content form__content--big" 
					method="POST" 
					action="{{ route('student.update') }}">

					@csrf @method('PUT')
					<h2 class="form__icon">
						<i class="fa-solid fa-chalkboard-user"></i>
					</h2>
					<h2 class="form__title">Mis datos personales</h2>

					<div class="grid-two">
						<div class="form__item">
							<label for="firts_name">Primer nombre:</label>
							<input class="form__input" 
									name="firts_name" 
									required 
									type="text" 
									id="firts_name" 
									value="{{ $student->firts_name }}"
									placeholder="Vanessa"
									minlength="3"
									maxlength="50"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="second_name">Segundo nombre:</label>
							<input class="form__input" 
									name="second_name" 
									required 
									type="text" 
									id="second_name"
									value="{{ $student->second_name }}" 
									placeholder="Vanessa"
									minlength="3"
									maxlength="50"
									autocomplete="off">
						</div>
					</div>

					<div class="grid-two">
						<div class="form__item">
							<label for="lastname">Primer apellido:</label>
							<input class="form__input" 
									name="lastname" 
									required 
									type="text" 
									id="lastname" 
									value="{{ $student->lastname }}" 
									placeholder="Longa"
									minlength="3"
									maxlength="50"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="second_lastname">Segundo apellido:</label>
							<input class="form__input" 
									name="second_lastname" 
									required 
									type="text" 
									id="second_lastname"
									value="{{ $student->second_lastname }}" 
									placeholder="Longa"
									minlength="3"
									maxlength="50"
									autocomplete="off">
						</div>
					</div>

					<div class="grid-two">
						<div class="form__item">
							<label for="gender">Genero:</label>
							<select class="form__input" 
										name="gender" 
										id="gender">
								<option value="{{ $student->gender }}" selected>{{ $student->gender }}</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
						<div class="form__item">
							<label for="birthdate">Fecha de Nacimiento:</label>
							<input class="form__input" 
									name="birthdate" 
									required 
									value="{{ $student->birthdate }}" 
									type="date" 
									id="birthdate" 
									autocomplete="off">
						</div>
					</div>

					<div class="grid-two">
						<div class="form__item">
							<label for="identification_card">Cédula:</label>
							<input class="form__input" 
									name="identification_card" 
									required 
									type="text" 
									id="identification_card" 
									value="{{ $student->identification_card }}" 
									placeholder="20111333"
									minlength="6"
									maxlength="8"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="number_phone">Número de teléfono:</label>
							<input class="form__input" 
									name="number_phone" 
									required 
									type="text" 
									id="number_phone"
									value="{{ $student->number_phone }}" 
									placeholder="04120001234"
									minlength="11"
									maxlength="11"
									autocomplete="off">
						</div>
					</div>

					<!-- Datos de Vivienda -->
					<div class="grid-two">
						<div class="form__item form__item--ubication">
							<label for="state">Estado:</label>
							<select class="form__input form__input--select" 
										name="state" 
										id="state">
								<option disabled selected>{{ $student->parishe->municipalitie->state->name }}</option>
								@foreach($states as $key => $item)
								<option value="{{ $item->name }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form__item form__item--municipalitie">
							<label for="municipalitie">Municipio:</label>
							<select class="form__input form__input--select" 
										name="municipalitie" 
										id="municipalitie">
								<option disabled selected>{{ $student->parishe->municipalitie->name }}</option>
								@foreach($municipalities as $key => $item)
								<option value="{{ $item->name }}" class="municipalitie municipalitie--{{ str_replace(' ', '_', $item->state->name) }}">{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="grid-one">
						<div class="form__item form__item--parishe">
							<label for="parishe">Parroquia:</label>
							<select class="form__input form__input--select" 
										name="parishe" 
										id="parishe">
								<option value="{{ $student->parishe->id }}" 
										selected>{{ $student->parishe->name }}</option>
								@foreach($parishes as $key => $item)
								<option value="{{ $item->id }}" 
									class="parishe parishe--{{ str_replace(' ', '_', $item->municipalitie->name) }} state--{{ str_replace(' ', '_', $item->municipalitie->state->name) }}">
									{{ $item->name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>


					<div class="grid-two">
						<div class="form__item">
							<label for="email">Correo Eléctronico:</label>
							<input class="form__input" 
									name="email" 
									required 
									value="{{ $student->email }}" 
									type="email" 
									id="email" 
									placeholder="vanessa@gmail.com"
									autocomplete="off">
						</div>
						<div class="form__item">
							<label for="reset_password">Contraseña:</label>
							<input class="form__input" 
									name="reset_password" 
									type="password" 
									id="reset_password" 
									placeholder="****"
									minlength="4"
									maxlength="20"
									autocomplete="off">
							<p class="form__eye"><i id="form_eye" class="fa-solid fa-eye"></i></p>
							<p>Si no quieres actualizar la contraseña debes dejarlo en blanco.</p>
						</div>
					</div>

					<input class="form__send" type="submit" value="Actualizar mis datos">

				</form>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/formEye.js') }}"></script>
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
	<script type="module" src="{{ asset('js/form/checkUbicationUpdate.js') }}"></script>
	<script type="module" src="{{ asset('js/components/profileImg.js') }}"></script>
@endsection