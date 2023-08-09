@extends('student.layout')


@section('title', '¡Bienvenido!')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="header__background header__background--student">
		<header class="header">
			<img class="header__img" 
					src="{{ asset($student->profileimg->url) }}" 
					alt="Imagen de una profesora">

			<div class="header__information">
				<h2 class="header__title">
					¡Bienvenido {{ $student->firts_name }}!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('student.profile') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mis datos
						</li>
					</a>
				</ul>
			</div>
		</header>
	</div>


	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="cuadricula">
				<img class="cuadricula__img" 
						src="{{ asset('img/student/certificate.png') }}" 
						alt="Profesor enseñando una materia">
				<div class="cuadricula-description">
					<h2 class="cuadricula-description__title">Observa tus resultados</h2>
					<h4 class="cuadricula-description__subtitle">¡Sigue aprendiendo con nosotros y obten tus certificados!</h4>
				</div>
				<div class="cuadricula-left">
					<h2 class="cuadricula__title">
						Cursos realizados:
						<strong class="color-Text">
							{{ $student->courses_count}}
						</strong>
					</h2>
					<ul class="header__bottons">
						<a href="#">
							<li class="header__loginItem header__loginItem--contrast">
								Ver mis cursos
							</li>
						</a>
					</ul>
				</div>
				<div class="cuadricula-right">
					<h2 class="cuadricula__title">
						Certificaciones: 
						<strong class="color-Text">
							{{ $student->certificates_count}}
						</strong>
					</h2>
					<ul class="header__bottons">
						<a href="#certificados">
							<li class="header__loginItem header__loginItem--contrast">
								Ver certificados
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')

@endsection