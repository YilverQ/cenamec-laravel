@extends('login.layout')


@section('title', 'Inicio')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/footer.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="header__background header__background--login">
		<header class="header">
			<img class="header__img" 
				src="{{ asset('img/login/header_icon.png') }}" 
				alt="Imagen principal, wallpaper de un laboratorio">
			
			<div class="header__information">
				<h2 class="header__title">
					¡Una forma divertida, efectiva y libre de aprender ciencias!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('login.signup') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Empieza ahora
						</li>
					</a>
					<a href="{{ route('login.login') }}">
						<li class="header__loginItem">Ya tengo una cuenta</li>
					</a>
				</ul>
			</div>
		</header>
		<div class="header__science">
			<ul class="header__scienceContainer">
				<li class="header__scienceItem"><i class="fa-solid fa-seedling"></i>Biología</li>
				<li class="header__scienceItem"><i class="fa-solid fa-atom"></i>Física</li>
				<li class="header__scienceItem"><i class="fa-solid fa-flask"></i>Química</li>
			</ul>
		</div>
	</div>


	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/login/funny.png') }}" 
					alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">Una forma <strong class="color-Text">divertida</strong> de aprender ciencia</h2>
					<p class="tab__description">¡El aprendizaje puede ser efectivo y divertido a la vez! Nuestra formula se basa en una técnica de aprendizaje que traslada la mécanica de juego al ambito educativo. Mediante niveles entretenidos y cada vez más competitivos, el estudiante podrá ganar recompensas generando experiencias positivas que le motiven a la finalización del curso.</p>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<div class="love-middle">
				<h2 class="love-middle__titleMain">¿Por qué te <strong class="color-Text">encantará</strong> aprender con nosotros?</h2>
				<section class="love-middle__information">
					<h3 class="love-middle__title"><i class="fa-solid fa-fire"></i>Efectivo y eficiente</h3>
					<p class="love-middle__description">Nuestras lecciones cortas ayudan a los alumnos a retener la información más importante. Los pequeños segmentos de formación se centran en un solo concepto o idea a la vez y lo hace más fácil de absorber que las lecciones tradicionales.</p>
				</section>
				<section class="love-middle__information">
					<h3 class="love-middle__title"><i class="fa-solid fa-circle-check"></i>Exámenes sencillos</h3>
					<p class="love-middle__description">A lo largo de los cursos, se hace precisa la evaluación continua del trabajo que se realiza. De esta manera la realimentación es constante y la evaluación es realmente formativa.</p>
				</section>
				<section class="love-middle__information">
					<h3 class="love-middle__title"><i class="fa-solid fa-person-running"></i>Te mantiene motivado</h3>
					<p class="love-middle__description">Al sentirse como un juego hacemos que sea fácil formar un hábito de aprendizaje. Además, siempre podrás ver tu progreso y comprobar tus conocimientos lo que te motivará a seguir aprendiendo.</p>
				</section>
				<section class="love-middle__information">
					<h3 class="love-middle__title"><i class="fa-solid fa-face-laugh-beam"></i>¡Es súper divertido!</h3>
					<p class="love-middle__description">El aprendizaje divertido realmente funciona porque consigue motivar a los alumnos, desarrollando un mayor compromiso, e incentiva el ánimo de superación.</p>
				</section>
				<img class="love-middle__img" 
					src="{{ asset('img/login/love.png') }}" 
					alt="Abrazo de una madre">
					
			</div>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab tab--reverse">
				<img class="tab__img tab__img--reverse" 
					src="{{ asset('img/login/daily.png') }}" 
					alt="Planeta tierra">

				<div class="tab__information">
					<h2 class="tab__title"><strong class="color-Text">Conocimiento</strong> para el día a día</h2>
					<p class="tab__description">El conocimiento no aplicado es igual a la falta de conocimiento. Sabemos que para alcanzar el éxito necesitas desarrollar tus habilidades poniendo en práctica todos los estudios adquiridos y que mejor forma que educar con con cosas que puedes ver en la vida real.</p>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab">
				<img class="tab__img" 
					src="{{ asset('img/login/time.png') }}" 
					alt="Aprende en cualquier momento">
				
				<div class="tab__information">
					<h2 class="tab__title">Aprende <strong class="color-Text">a cualquier hora, en cualquier lugar.</strong></h2>
					<ol class="tab__content">
						<li class="tab__description tab__description--list">Acceso las 24 horas. El estudiante sólo necesita tener conexión a internet para poder acceder a los contenidos del curso.</li>
						<li class="tab__description tab__description--list">¿No te puedes conectar ahora? No te preocupes. El curso comienza cuando tengas tiempo y disponibilidad, de tal forma que puedes empezar en septiembre, octubre, enero o julio.</li>
						<li class="tab__description tab__description--list">Los cursos están diseñado para ser completado según tu capacidad. Puedes consultar los contenidos educativos cuando quieras y cuantas veces quieras, esto para que el alumno sea capaz de completar su formación al ritmo que él desee.</li>
					</ol>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab">
				<img class="tab__img tab__img--reverse" 
					src="{{ asset('img/login/certificate.png') }}" 
					alt="Obtén un certificado">
				
				<div class="tab__information">
					<h2 class="tab__title">Obtén un <strong class="color-Text">certificado</strong></h2>
					<p class="tab__description">El objetivo del <strong>CENAMEC</strong> es la de proveer educación y grandes oportunidades para todos aquellos interesados, por lo tanto obtener un certificado de finalización es posible y completamente gratuito. Demuestra con orgullo tus certificados de finalización ya que cuentan con validación de parte del <strong>Ministerio de Eduación de Venezuela</strong>.</p>
				</div>
			</section>
		</article>
	</main>


	<footer class="footer">
		<div class="endTitle">
			<h3 class="endTitle__title">Aprende Ciencias con el CENAMEC</h3>
			<ul class="header__bottons">
				<a href="{{ route('login.signup') }}">
					<li class="header__loginItem">
						Empieza ahora
					</li>
				</a>
			</ul>
		</div>
		<div class="endSections">
			<div class="endSection">
				<h4 class="endSection__title">Sobre Nosotros</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item">Misión</li>
					<li class="endSection__item">Equipo</li>
					<li class="endSection__item">Investigación</li>
					<li class="endSection__item">Contáctanos</li>
				</ul>
			</div>
			<div class="endSection">
				<h4 class="endSection__title">Otras páginas</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item">CENAMEC</li>
					<li class="endSection__item">MPPPE</li>
					<li class="endSection__item">Proyecto</li>
				</ul>
			</div>
			<div class="endSection">
				<h4 class="endSection__title">Redes Sociales</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item">Blog</li>
					<li class="endSection__item">Instagram</li>
					<li class="endSection__item">Facebook</li>
					<li class="endSection__item">Twitter</li>
					<li class="endSection__item">Youtube</li>
				</ul>
			</div>
			<div class="endSection">
				<h4 class="endSection__title">Términos y privacidad</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item">Normas de la comunidad</li>
					<li class="endSection__item">Términos</li>
					<li class="endSection__item">Privacidad</li>
				</ul>
			</div>
		</div>
	</footer>
@endsection