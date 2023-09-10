@extends('login.layout')


@section('title', 'Registro')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
@endsection

@section('content')
	<form class="form__content form__content--big" 
			method="POST" 
			action="{{ route('login.newStudent') }}">

		@csrf @method('POST')
		<h2 class="form__icon">
			<i class="fa-solid fa-user-plus"></i>
		</h2>
		<h2 class="form__title">Estudiante nuevo</h2>

		<div class="grid-two">
			<div class="form__item">
				<label for="name">Primer nombre:</label>
				<input class="form__input" 
						name="firts_name" 
						required 
						type="text" 
						id="firts_name" 
						placeholder="Vanessa"
						minlength="3"
						maxlength="50"
						autocomplete="off">
			</div>
			<div class="form__item">
				<label for="name">Segundo nombre:</label>
				<input class="form__input" 
						name="second_name" 
						required 
						type="text" 
						id="second_name" 
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
						placeholder="Longa"
						minlength="3"
						maxlength="50"
						autocomplete="off">
			</div>
			<div class="form__item">
				<label for="lastname">Segundo apellido:</label>
				<input class="form__input" 
						name="second_lastname" 
						required 
						type="text" 
						id="second_lastname" 
						placeholder="Longa"
						minlength="3"
						maxlength="50"
						autocomplete="off">
			</div>
		</div>

		<div class="grid-two">
			<div class="form__item">
				<label for="gender">Genero:</label>
				<select class="form__input form__input--select" 
							name="gender" 
							id="gender">
					<option disabled selected>Selecciona un genero</option>
					<option value="Masculino">Masculino</option>
					<option value="Femenino">Femenino</option>
				</select>
			</div>
			<div class="form__item">
				<label for="birthdate">Fecha de Nacimiento:</label>
				<input class="form__input" 
						name="birthdate" 
						required 
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
					<option disabled selected>Selecciona un Estado</option>
					@foreach($states as $key => $item)
					<option value="{{ $item->name }}">{{ $item->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form__item form__item--disabled--municipalitie">
				<label>Municipio:</label>
				<select class="form__input--disabled">
					<option disabled selected>Selecciona un estado primero</option>
				</select>
			</div>
			<div class="form__item form__item--municipalitie form__item--hidden">
				<label for="municipalitie">Municipio:</label>
				<select class="form__input form__input--select" 
							name="municipalitie" 
							id="municipalitie">
					<option disabled selected>Selecciona un Municipio</option>
					@foreach($municipalities as $key => $item)
					<option value="{{ $item->name }}" class="municipalitie municipalitie--{{ str_replace(' ', '_', $item->state->name) }}">{{ $item->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="grid-one">
			<div class="form__item form__item--disabled--parishe form__item--disabled">
				<label>Parroquia:</label>
				<select class="form__input--disabled">
					<option disabled selected>Selecciona un municipio primero</option>
				</select>
			</div>
			<div class="form__item form__item--parishe form__item--hidden">
				<label for="parishe">Parroquia:</label>
				<select class="form__input form__input--select" 
							name="parishe" 
							id="parishe">
					<option disabled selected>Selecciona una Parroquia</option>
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
						type="email" 
						id="email" 
						placeholder="vanessa@gmail.com"
						autocomplete="off">
			</div>
			<div class="form__item">
				<label for="password">Contraseña:</label>
				<input class="form__input" 
						name="password" 
						required 
						type="password" 
						id="password" 
						placeholder="****"
						minlength="4"
						maxlength="20"
						autocomplete="off">
				<p class="form__eye"><i id="form_eye" class="fa-solid fa-eye"></i></p>
			</div>
		</div>


		
		
		<input class="form__send" type="submit" value="¡Vamos a estudiar!">
	</form>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/form/formEye.js') }}"></script>
	<script type="module" src="{{ asset('js/form/form.js') }}"></script>
	<script type="module" src="{{ asset('js/form/checkUbication.js') }}"></script>
@endsection