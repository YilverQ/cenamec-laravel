@extends('student.layout')


@section('title', 'Detalles del curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/headerBackground.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
	<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
@endsection



@section('content')
		<!--Header-->
	<div class="containerHeader">
		<img src="{{ $course->img }}" alt="Imagen del curso {{ $course->name }}" class="headerBackground__img">
		<div class="sabana"></div>
		<header class="headerBackground">
			<div class="headerBackground__information">
				<div>
					<small class="descriptionContent">Título del curso:</small>
					<h2 class="headerBackground__title">{{ $course->name }}</h2>
				</div>
			</div>
		</header>
	</div>

	<div class="descriptionBanner">
		<nav class="descriptionBanner__nav">
			<p class="descriptionBanner__item descriptionBanner__item--checked">Propósito</p>
			<p class="descriptionBanner__item">Objetivos</p>
			<p class="descriptionBanner__item">Competencias a lograr</p>
			<p class="descriptionBanner__item">Profesores</p>
			<p class="collapse__icon">
				<i class="collapse__text fa-solid fa-chevron-up"></i></i>
				<i class="collapse__text hidden fa-solid fa-chevron-down"></i></i>
			</p>
		</nav>
		<div class="descriptionInfo">
			<div class="descriptionCard">
				<h3 class="smallInformation__title">Propósito del curso</h3>
				<p class="smallInformation">{{ $course->purpose }}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Objetivo General</h3>
				<p class="smallInformation">{{ $course->general_objetive }}</p>
				<h3 class="smallInformation__title smallInformation__title--second">Objetivos Especifícos</h3>
				<p class="smallInformation">{!! nl2br($course->specific_objetive) !!}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Competencias a lograr</h3>
				<p class="smallInformation">{!! nl2br($course->competence) !!}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Profesores asignados al curso</h3>
				<div class="containerTableUser">
				<table class="listUser" id="teacherTable">
					<thead class="listUser__head">
						<tr class="listUser__trHead">
							<th class="listUser__thHead">
								Foto
							</th>
							<th class="listUser__thHead">
								Nombre
							</th>
							<th class="listUser__thHead">
								Apellido
							</th>
							<th class="listUser__thHead">
								Correo<span class="visibilityFalse">i</span>electrónico
							</th>
						</tr>
					</thead>
					<tbody class="listUser__head">
		        		@foreach ($teachers as $key => $item)
						<tr class="listUser__trBody">
							<td class="listUser__tdBody">
								<img class="imgTable" src="{{ $item->user->profileImg->url }}" alt="foto de perfil">
							</td>
							<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
							<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
							<td class="listUser__tdBody">{{ $item->user->email }}</td>
						</tr>
		        		@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

	<main class="container">
		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered">
				Módulos del <strong class="color-Text">curso</strong>
			</h2>
			@if (empty($modules[0]))
				<h3>No hay módulos</h3>
			@else
				<section class="containerModules">
				@foreach ($modules as $key => $item)
					@if ($item->state == "active")
					<div class="cardModule">
						<span class="cardModule__number">{{ $item->level }}</span>
						<h3 class="cardModule__title">{{ $item->name }}</h3>
						<p class="cardModule__item cardModule__item--note">
							<i class="fa-solid fa-note-sticky"></i>
							Notas educativas: {{ $item->notes_count }}
						</p>
						<p class="cardModule__item cardModule__item--question">
							<i class="fa-solid fa-clipboard-question"></i>
							Preguntas: {{ $item->questionnaires_count }}
						</p>
						<ul class="list__actions list__actions--course">
							<a href="{{ route('student.module.study', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Estudiar</a>
						</ul>
					</div>
					<div class="bar"></div>
					@elseif($item->state == "finished")
						@if ($item->percentage == 100)
							<div class="cardModule cardModule--finished">
								<span class="cardModule__number">{{ $item->level }}</span>
								<h3 class="cardModule__title">{{ $item->name }}</h3>
								<p class="cardModule__item cardModule__item--note">
									<i class="fa-solid fa-note-sticky"></i>
									Notas educativas: {{ $item->notes_count }}
								</p>
								<p class="cardModule__item cardModule__item--question">
									<i class="fa-solid fa-clipboard-question"></i>
									Preguntas: {{ $item->questionnaires_count }}
								</p>
								<ul class="list__actions list__actions--course list__actions--course-white">
									<a href="{{ route('student.module.study', $item) }}" title="Ver más" class="icon icon--show icon--repeat"><i class="fa-solid fa-eye"></i> Repetir</a>
								</ul>
								<span class="cardModule__percentage">
									<progress class="completePercentage" max="100" value="100"></progress>
									{{ $item->percentage }}%
								</span>
							</div>
						@else
							<div class="cardModule">
								<span class="cardModule__number">{{ $item->level }}</span>
								<h3 class="cardModule__title">{{ $item->name }}</h3>
								<p class="cardModule__item cardModule__item--note">
									<i class="fa-solid fa-note-sticky"></i>
									Notas educativas: {{ $item->notes_count }}
								</p>
								<p class="cardModule__item cardModule__item--question">
									<i class="fa-solid fa-clipboard-question"></i>
									Preguntas: {{ $item->questionnaires_count }}
								</p>
								<ul class="list__actions list__actions--course list__actions--course-white">
									<a href="{{ route('student.module.study', $item) }}" title="Ver más" class="icon icon--show icon--repeat"><i class="fa-solid fa-eye"></i> Repetir</a>
								</ul>
								<span class="cardModule__percentage">
									<progress max="100" value="{{ $item->percentage }}"></progress>
									{{ $item->percentage }}%
								</span>
							</div>
						@endif
					
					<div class="bar"></div>
					@else
					<div class="cardModule cardModule--student-block">
						<span class="cardModule__number">{{ $item->level }}</span>
						<h3 class="cardModule__title">{{ $item->name }}</h3>
						<p class="cardModule__item cardModule__item--note">
							<i class="fa-solid fa-note-sticky"></i>
							Notas educativas: {{ $item->notes_count }}
						</p>
						<p class="cardModule__item cardModule__item--question">
							<i class="fa-solid fa-clipboard-question"></i>
							Preguntas: {{ $item->questionnaires_count }}
						</p>
						<ul class="list__actions list__actions--course">
							<li class="icon icon--lock">
								<i class="fa-solid fa-lock iconBlockCourse"></i> 
							</li>
						</ul>
					</div>
					<div class="bar"></div>
					@endif
				@endforeach
				</section>
			@endif
			<div class="bottonEnd">
				@if ($certificate)
				<a href="{{ route('certificate.show', $certificate) }}">
					<li class="bottonEnd__text bottonEnd__text--contrast">
						Generar certificado
					</li>
				</a>
				@else
				<a>
					<li class="bottonEnd__text">
						Generar certificado
					</li>
				</a>
				@endif
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/course/descriptionBanner.js') }}"></script>
	<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
	<script type="text/javascript">
		let table = new DataTable('#teacherTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ usuarios",
	            "zeroRecords": "No se encontró nada - Disculpa",
	            "info": "Mostrando la página _PAGE_ de _PAGES_",
	            "infoEmpty": "No hay registros disponibles",
	            "infoFiltered": "(filtrado de _MAX_ registros totales)",
	            "search": "Buscar:",
	            "paginate": {
	            	"next": "Siguiente",
	            	"previous": "Anterior"
	            }
	        }
		});
	</script>
@endsection