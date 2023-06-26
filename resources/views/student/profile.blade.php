@extends('student.layout')


@section('title', 'Datos del estudiante')
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
						src="{{ asset('img/student/header_icon.png') }}" 
						alt="Niño aprendiendo">

				<div class="tab__information">
					<h2 class="tab__title">
						Mis datos: <strong class="color-Text">{{ $student->name }}</strong>
					</h2>
					<section class="content-data">
						<div class="data-view">
							<h3 class="data-view__title">Nombre:</h3>
							<p class="data-view__description">{{ $student->name }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Apellido:</h3>
							<p class="data-view__description">{{ $student->lastname }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de teléfono:</h3>
							<p class="data-view__description">{{ $student->number_phone }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Número de cédula:</h3>
							<p class="data-view__description">{{ $student->identification_card }}</p>	
						</div>
						<div class="data-view">
							<h3 class="data-view__title">Correo electrónico:</h3>
							<p class="data-view__description">{{ $student->email }}</p>	
						</div>		            
					</section>
					<ul class="header__bottons">
						<a href="{{ route('student.edit') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Editar mis datos
							</li>
						</a>
						<form 
			            	action="{{ route('student.destroy', $student) }}" 
			            	method="POST" 
			            	class="form__delete">
			                
			                @csrf
			                @method('DELETE')
			                <button type="submit" class="header__loginItem header__loginItem--delete">Eliminar usuario</button>                
		                </form>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
@endsection